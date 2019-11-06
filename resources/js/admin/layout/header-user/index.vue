<template>
  <span class="el-layout-header-trigger el-layout-header-trigger-min">
    <el-dropdown :trigger="triggerType" class="el-layout-header-user" :class="{ 'el-layout-header-user-mobile': isMobile }" @click="handleClick">
      <div>
        <el-avatar v-if="info.avatar" size="small" :src="info.avatar" />
        <span v-if="!isMobile" class="el-layout-header-user-name">{{ info.display_name || info.name }}</span>
      </div>
      <el-dropdown-menu slot="dropdown" :visibleArrow="false" :class="{ 'el-layout-header-user-mobile': isMobile }">
        <el-dropdown-item icon="el-icon-user">
          <span>用户中心</span>
        </el-dropdown-item>
        <el-dropdown-item icon="el-icon-setting">
          <span>用户设置</span>
        </el-dropdown-item>
        <el-dropdown-item divided icon="el-icon-switch-button">
          <span>退出登录</span>
        </el-dropdown-item>
      </el-dropdown-menu>
    </el-dropdown>
  </span>
</template>
<script>
    import { mapState, mapActions } from 'vuex'

    export default {
        name: 'HeaderUser',
        computed: {
            ...mapState('user', [
                'info'
            ]),
            ...mapState('layout', [
                'isMobile',
                'logoutConfirm'
            ]),
            triggerType () {
                return this.isMobile ? 'click' : 'hover'
            }
        },
        methods: {
            ...mapActions('user', [
                'logout'
            ]),
            handleClick (name) {
                if (name === 'logout') {
                    this.logout({
                        confirm: this.logoutConfirm,
                        vm: this
                    })
                }
            }
        }
    }
</script>
