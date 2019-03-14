<template>
  <div :class="{
    right: true,
    dark: darkClass
  }"
  >
    <header-search class="action search" @search="onSearch" />
    <a-tooltip title="Help">
      <a target="_blank" href="https://github.com/loyep/grace" rel="noopener noreferrer" class="action">
        <a-icon type="question-circle-o" />
      </a>
    </a-tooltip>
    <notice-icon class="action" />
    <a-dropdown
      class="action account"
    >
      <span class="dropDown">
        <a-avatar class="avatar" size="small" :src="user.avatar" />
        <span class="name">
          {{ user.display_name }}
        </span>
      </span>
      <template v-slot:overlay>
        <a-menu class="menu">
          <a-menu-item>
            <router-link :to="{ name: 'profile' }">
              <a-icon type="user" />
              个人中心
            </router-link>
          </a-menu-item>
          <a-menu-item key="userinfo">
            <router-link :to="{ path: '/user/setting' }">
              <a-icon type="setting" />
              账号设置
            </router-link>
          </a-menu-item>
          <a-menu-divider />
          <a-menu-item @click="logout">
            <a-icon type="logout" />
            退出登录
          </a-menu-item>
        </a-menu>
      </template>
    </a-dropdown>
    <select-lang class="action" />
  </div>
</template>

<script>
import { Avatar, Menu, Dropdown } from 'ant-design-vue'
import SelectLang from '@/components/SelectLang'
import HeaderSearch from '@/components/HeaderSearch'
import NoticeIcon from '@/components/NoticeIcon'
import { themeMixin } from '@/mixins'
import { mapGetters } from 'vuex'

export default {
  name: 'RightContent',
  components: {
    SelectLang,
    NoticeIcon,
    HeaderSearch,
    'AAvatar': Avatar,
    'ADropdown': Dropdown,
    'AMenu': Menu,
    'AMenuDivider': Menu.Divider,
    'AMenuItem': Menu.Item
  },
  mixins: [ themeMixin ],
  computed: {
    ...mapGetters('auth', [
      'user'
    ]),
    darkClass () {
      if (this.isMobile || !this.isTopMenu) {
        return false
      }
      return this.navTheme === 'dark'
    }
  },
  methods: {
    logout () {
      const that = this
      this.$confirm({
        title: '提示',
        content: '真的要注销登录吗 ?',
        onOk () {
          return that.$store.dispatch('auth/Logout').then(() => {
            location.reload()
          }).catch(() => {
            console.log('Oops errors!')
          })
        },
        onCancel () {}
      })
    },
    onSearch (value) {
      console.log(value)
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.menu {
  :global(.anticon) {
    margin-right: 8px;
  }
  :global(.ant-dropdown-menu-item) {
    min-width: 160px;
  }
}

.right {
  float: right;
  height: 100%;
  overflow: hidden;
  .action {
    cursor: pointer;
    padding: 0 12px;
    display: inline-block;
    transition: all 0.3s;
    font-size: @font-size-base;
    height: 100%;
    > :global(i) {
      vertical-align: middle;
      color: @text-color;
    }
    &:hover {
      background: @pro-header-hover-bg;
    }
    &:global(.opened) {
      background: @pro-header-hover-bg;
    }
  }
  .search {
    padding: 0 12px;
    &:hover {
      background: transparent;
    }
  }
  .account {
    .avatar {
      margin: ~'calc((@{layout-header-height} - 24px) / 2)' 0;
      margin-right: 8px;
      color: @primary-color;
      background: rgba(255, 255, 255, 0.85);
      vertical-align: top;
    }
  }
}

.dark {
  height: @layout-header-height;
  .action {
    color: rgba(255, 255, 255, 0.85);
    > :global(i) {
      color: rgba(255, 255, 255, 0.85);
    }
    &:hover {
      background: @primary-color;
    }
  }
}

@media only screen and (max-width: @screen-md) {
  .header {
    :global(.ant-divider-vertical) {
      vertical-align: unset;
    }
    .name {
      display: none;
    }
    i.trigger {
      padding: 22px 12px;
    }
    .logo {
      position: relative;
      padding-right: 12px;
      padding-left: 12px;
    }
    .right {
      position: absolute;
      top: 0;
      right: 12px;
      background: #fff;
      .account {
        .avatar {
          margin-right: 0;
        }
      }
    }
  }
}

</style>
