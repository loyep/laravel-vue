<script lang="ts">
import { Component, Vue, Prop, Watch } from "vue-property-decorator";
import { State, Mutation, namespace } from "vuex-class";
import { Menu, Icon } from "ant-design-vue";
import path from "path";
import { isUrl } from "@/utils/utils";
import IconFont from "@/components/IconFont/index.vue";

const themeModule = namespace("theme");

@Component({
  components: {
    Icon
  }
})
export default class BaseMenu extends Vue {
  @Prop({ default: "inline" })
  mode: string;

  @Prop()
  theme: string;

  @Prop({ default: false })
  collapsed: boolean;

  @Prop()
  menus: Array<any>;

  private openKeys: Array<any> = [];
  private selectedKeys: Array<any> = [];
  private cachedOpenKeys: Array<any> = [];

  get rootSubmenuKeys(): Array<string> {
    const keys: Array<string> = [];
    this.menus.forEach(item => keys.push(path.resolve(item.path)));
    return keys;
  }

  @Watch("$route")
  onRouteChanged(val: any, oldVal: any) {
    this.updateMenu();
  }

  @Watch("collapsed")
  onCollapsedChanged(val: boolean, oldVal: boolean) {
    if (val) {
      this.cachedOpenKeys = this.openKeys.concat();
      this.openKeys = [];
    } else {
      this.openKeys = this.cachedOpenKeys;
    }
  }

  mounted() {
    this.updateMenu();
  }

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
  }

  renderMenuItem(h, menu: any, pIndex, index, basePath: string) {
    const target = menu.meta.target || null;
    const routePath = path.resolve(basePath, menu.path);
    return h(Menu.Item, { key: routePath }, [
      h("router-link", { attrs: { to: { path: routePath }, target } }, [
        this.renderIcon(h, menu.meta.icon),
        h("span", [menu.meta.title])
      ])
    ]);
  }

  renderSubMenu(h, menu, pIndex, index, basePath) {
    const that = this;
    const subItem = [
      h("span", { slot: "title" }, [
        this.renderIcon(h, menu.meta.icon),
        h("span", [menu.meta.title])
      ])
    ];
    const itemArr: Array<any> = [];
    const pIndex_ = `${pIndex}_${index}`;
    const routePath = path.resolve(basePath, menu.path);
    if (!menu.hideChildrenInMenu) {
      menu.children.forEach((item, i) => {
        itemArr.push(that.renderItem(h, item, pIndex_, i, routePath));
      });
    }
    return h(Menu.SubMenu, { key: routePath }, subItem.concat(itemArr));
  }

  renderItem(h, menu, pIndex, index, basePath): any {
    if (!menu.hidden) {
      return menu.children && !menu.hideChildrenInMenu
        ? this.renderSubMenu(h, menu, pIndex, index, basePath)
        : this.renderMenuItem(h, menu, pIndex, index, basePath);
    }
  }

  renderMenu(h, menuTree: Array<any>, basePath) {
    if (menuTree === undefined) return [];
    const that = this;
    const menuArr: Array<any> = [];
    menuTree.forEach((menu, i) => {
      if (!menu.hidden) {
        menuArr.push(that.renderItem(h, menu, "0", i, basePath));
      }
    });
    return menuArr;
  }

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
  }

  updateMenu() {
    const routes: Array<string> = this.$route.matched
      .concat()
      .filter(item => item.path)
      .map(item => {
        return item.path;
      });

    if (routes.length >= 4 && this.$route.meta.hidden) {
      routes.pop();
    }
    let routePath: string | undefined = routes.pop();
    let selectedKeys: Array<string | undefined> = [routePath].map(item => {
      if (item !== undefined && item !== "/") {
        return path.resolve(item);
      }
      return item;
    });

    this.selectedKeys = selectedKeys;

    const openKeys: Array<string> = [];
    routes.forEach(item => {
      if (item.length > 0) {
        if (this.mode === "inline") {
          openKeys.push(item);
        }
      }
    });

    this.collapsed
      ? (this.cachedOpenKeys = openKeys)
      : (this.openKeys = openKeys);
  }

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
}
</script>

<style lang="less" scoped>
.icon {
  width: 14px;
  vertical-align: baseline;
}
</style>
