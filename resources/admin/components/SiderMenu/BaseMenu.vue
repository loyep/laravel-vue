<script>
import { State, Mutation, namespace } from "vuex-class";
import { Menu, Icon } from "ant-design-vue";
import path from "path";
import { isUrl } from "@/utils/utils";
import IconFont from "@/components/IconFont";

const themeModule = namespace("theme");

export default {
  name: "BaseMenu",
  components: {
    Icon
  },
  props: {
    mode: {
      type,
      default: "inline"
    },
    theme: {
      type,
      required: true
    },
    collapsed: {
      type: Boolean,
      default: false
    },
    menus: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      openKeys: [],
      selectedKeys: [],
      cachedOpenKeys: []
    };
  },
  computed: {
    rootSubmenuKeys() {
      const keys = [];
      this.menus.forEach(item => keys.push(path.resolve(item.path)));
      return keys;
    }
  },
  watch: {
    $route(val, oldVal) {
      this.updateMenu();
    },
    collapsed(val, oldVal) {
      if (val) {
        this.cachedOpenKeys = this.openKeys.concat();
        this.openKeys = [];
      } else {
        this.openKeys = this.cachedOpenKeys;
      }
    }
  },

  mounted() {
    this.updateMenu();
  },
  methods: {
    renderIcon(h, icon) {
      if (typeof icon === "string") {
        if (isUrl(icon)) {
          return h(Icon, {
            props: {
              component: {
                template: `<img src="${icon}" class="icon" />`
              }
            }
          });
        }
        if (icon.startsWith("icon-")) {
          return h(IconFont, { props: { type: icon } });
        }
        return h(Icon, { props: { type: icon !== undefined ? icon : "" } });
      }
      return icon === "none" || icon === undefined
        ? null
        : h(Icon, { props: { type: icon !== undefined ? icon : "" } });
    },

    renderMenuItem(h, menu, pIndex, index, basePath) {
      const target = menu.meta.target || null;
      const routePath = path.resolve(basePath, menu.path);
      return h(Menu.Item, { key: routePath }, [
        h("router-link", { attrs: { to: { path: routePath }, target } }, [
          this.renderIcon(h, menu.meta.icon),
          h("span", [menu.meta.title])
        ])
      ]);
    },

    renderSubMenu(h, menu, pIndex, index, basePath) {
      const that = this;
      const subItem = [
        h("span", { slot: "title" }, [
          this.renderIcon(h, menu.meta.icon),
          h("span", [menu.meta.title])
        ])
      ];
      const itemArr = [];
      const pIndex_ = `${pIndex}_${index}`;
      const routePath = path.resolve(basePath, menu.path);
      if (!menu.meta.hideChildrenInMenu) {
        menu.children.forEach((item, i) => {
          itemArr.push(that.renderItem(h, item, pIndex_, i, routePath));
        });
      }
      return h(Menu.SubMenu, { key: routePath }, subItem.concat(itemArr));
    },

    renderItem(h, menu, pIndex, index, basePath) {
      if (!menu.hidden) {
        return menu.children && !menu.meta.hideChildrenInMenu
          ? this.renderSubMenu(h, menu, pIndex, index, basePath)
          : this.renderMenuItem(h, menu, pIndex, index, basePath);
      }
    },

    renderMenu(h, menuTree, basePath) {
      if (menuTree === undefined) return [];
      const that = this;
      const menuArr = [];
      menuTree.forEach((menu, i) => {
        if (!menu.hidden) {
          menuArr.push(that.renderItem(h, menu, "0", i, basePath));
        }
      });
      return menuArr;
    },

    onOpenChange(openKeys) {
      const mainMenu = this.rootSubmenuKeys;
      const latestOpenKey = openKeys.filter(key => {
        return mainMenu.includes(key);
      });
      if (latestOpenKey.length > 1) {
        this.openKeys = [openKeys.pop()];
      } else {
        this.openKeys = [...openKeys];
      }
    },

    updateMenu() {
      const routes = [];
      this.$route.matched.concat().every(item => {
        if (item.path) {
          routes.push(item.path);
        }

        if (item.meta.hideChildrenInMenu) {
          return false;
        }
        return true;
      });

      if (routes.length >= 4 && this.$route.meta.hidden) {
        routes.pop();
      }

      let routePath = routes.pop();
      let selectedKeys = [routePath].map(item => {
        if (item !== undefined && item !== "/") {
          return path.resolve(item);
        }
        return item;
      });

      this.selectedKeys = selectedKeys;

      const openKeys = routes.filter(item => {
        return item.length > 0 && this.mode === "inline";
      });

      this.collapsed
        ? (this.cachedOpenKeys = openKeys)
        : (this.openKeys = openKeys);
    }
  },

  render(h) {
    return h(
      Menu,
      {
        props: {
          theme: this.$props.theme,
          mode: this.$props.mode,
          openKeys: this.openKeys,
          selectedKeys: this.selectedKeys
        },
        class: [
          BaseMenu,
          {
            "top-nav-menu": this.$props.mode === "horizontal"
          }
        ],
        on: {
          openChange: this.onOpenChange,
          select: obj => {
            this.selectedKeys = obj.selectedKeys;
            this.$emit("select", obj);
          }
        }
      },
      this.renderMenu(h, this.menus, "/")
    );
  }
};
</script>

<style lang="less" scoped>
// .icon {
//   width: 14px;
//   vertical-align: baseline;
// }
</style>
