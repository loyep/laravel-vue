<template>
  <footer class="globalFooter">
    <div class="links">
      <a v-for="link in footerLinks" :key="link.key" :href="link.path" :target="link.target || '_blank'">
        <a-icon v-if="link.icon" :type="link.icon" /> {{ link.title }}
      </a>
      <!--<router-link v-for="link in links" :key="link.key" :to="{ path: link.path }"><a-icon v-if="link.icon" :type="link.icon"/> {{ link.title }}</router-link>-->
    </div>
    <div class="copyright">
      <slot name="copyright" />
    </div>
  </footer>
</template>

<script>
export default {
  name: 'GlobalFooter',
  props: {
    links: {
      type: Array,
      default: () => {
        return []
      }
    }
  },
  computed: {
    footerLinks () {
      // role.permissionList = role.permissions.map(permission => { return permission.permissionId })
      return this.links.map(link => {
        if (link.path !== undefined && link.path.substr(0, 7).toLowerCase() !== 'http://' && link.path.substr(0, 8).toLowerCase() !== 'https://') {
          link.path = `${this.$router.base}/${(this.$router.mode === 'hash' ? '#/' : '')}${link.path}`
        }

        if (link.blankTarget) {
          link.target = '_blank'
        } else {
          link.target = '_self'
        }
        return link
      })
    }
  }
}
</script>

<style lang="less" scoped>
@import '~@/styles/variables.less';

.globalFooter {
  padding: 0 16px;
  margin: 48px 0 24px 0;
  text-align: center;

  .links {
    margin-bottom: 8px;

    a {
      color: @text-color-secondary;
      transition: all 0.3s;

      &:not(:last-child) {
        margin-right: 40px;
      }

      &:hover {
        color: @text-color;
      }
    }
  }

  .copyright {
    color: @text-color-secondary;
    font-size: @font-size-base;
  }
}
</style>
