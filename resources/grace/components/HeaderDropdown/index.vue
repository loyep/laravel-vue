<template>
  <a-dropdown>
    <span class="dropDown">
      <avatar :src="user.avatar" />
      <span class="name">
        {{ user.name }}
      </span>
    </span>
    <template slot="overlay">
      <a-menu class="menu">
        <a-menu-item>
          <router-link :to="{ path: '/user/profile' }">
            <a-icon type="user" />
            个人资料
          </router-link>
        </a-menu-item>
        <a-menu-item key="userinfo">
          <a-icon type="setting" />
          设置
        </a-menu-item>
        <a-menu-divider />
        <a-menu-item @click="logout">
          <a-icon type="logout" />
          退出
        </a-menu-item>
      </a-menu>
    </template>
  </a-dropdown>
</template>

<script>
import { Avatar, Menu } from 'ant-design-vue'

const { Item, Divider } = Menu

export default {
  name: 'HeaderDropdown',

  components: {
    Avatar,
    'a-menu': Menu,
    'a-menu-item': Item,
    'a-menu-divider': Divider
  },

  data () {
    return {
      user: {

      }
    }
  },

  created () {
    this.user = this.$store.getters['auth/user']
  },

  methods: {
    logout () {
      const that = this
      this.$confirm({
        title: '提示',
        content: '真的要注销登录吗 ?',
        onOk () {
          return that.$store.dispatch('auth/Logout').then(() => {
            that.$router.push({ path: '/login' })
          }).catch(() => {
            console.log('Oops errors!')
          })
        },
        onCancel () {}
      })
    }
  }
}
</script>

<style lang="less" scoped>
    @import '~@/styles/variables.less';

    .dropDown {
        cursor: pointer;
        vertical-align: top;
        line-height: @layout-header-height;

        > i {
            font-size: 14px !important;
            transform: none !important;

            svg {
                position: relative;
                top: -1px;
            }
        }
    }

</style>

<style lang="less">
    @import '~@/styles/variables.less';

    .menu {
        .anticon {
            margin-right: 8px;
        }

        .ant-dropdown-menu-item {
            min-width: 160px;
        }
    }
</style>
