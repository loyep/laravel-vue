<template>
  <el-breadcrumb v-if="!isLimit" ref="breadcrumb" class="el-layout-header-breadcrumb">
    <el-breadcrumb-item>
      <menu-head-title :item="topItem" :hideIcon="!showBreadcrumbIcon" />
    </el-breadcrumb-item>
    <el-breadcrumb-item v-for="item in items" :key="item.path">
      <menu-head-title :item="item" :hideIcon="!showBreadcrumbIcon" />
    </el-breadcrumb-item>
    <el-breadcrumb-item>
      <menu-head-title :item="siderMenuObject[activePath]" :hideIcon="!showBreadcrumbIcon" />
    </el-breadcrumb-item>
  </el-breadcrumb>
</template>
<script>
    import { mapState } from 'vuex'
    import menuSider from '@/menu/sider'
    import { flattenSiderMenu } from '@/libs/system'
    import MenuHeadTitle from '../menu-head/title'
    import { on, off } from 'iview/src/utils/dom'
    import { findComponentUpward, getStyle } from 'iview/src/utils/assist'
    import { throttle } from 'lodash'

    export default {
        name: 'IHeaderBreadcrumb',
        components: { MenuHeadTitle },
        data () {
            return {
                // 得到所有侧边菜单，并转为平级，查询图标及显示对应内容
                allSiderMenu: flattenSiderMenu(menuSider, []),
                handleResize: () => {},
                isLimit: false,
                maxWidth: 560,
                breadcrumbWidth: 0
            }
        },
        computed: {
            ...mapState('admin/layout', [
                'showBreadcrumbIcon',
                'menuCollapse'
            ]),
            ...mapState('admin/menu', [
                'openNames',
                'activePath',
                'header',
                'headerName'
            ]),
            siderMenuObject () {
                const obj = {}
                this.allSiderMenu.forEach(item => {
                    if ('path' in item) {
                        obj[item.path] = item
                    }
                })
                return obj
            },
            items () {
                const items = [...this.openNames]
                const newItems = []
                items.forEach(i => {
                    newItems.push(this.siderMenuObject[i])
                })
                return newItems
            },
            // 第一级，默认是 menu/header.js 中的第一项
            topItem () {
                return this.header.find(item => item.name === this.headerName)
            }
        },
        watch: {
            topItem: {
                handler () {
                    this.handleGetWidth()
                    this.handleCheckWidth()
                },
                deep: true
            },
            items: {
                handler () {
                    this.handleGetWidth()
                    this.handleCheckWidth()
                },
                deep: true
            },
            activePath: {
                handler () {
                    this.handleGetWidth()
                    this.handleCheckWidth()
                },
                deep: true
            }
        },
        mounted () {
            this.handleResize = throttle(this.handleCheckWidth, 100, { leading: false })
            on(window, 'resize', this.handleResize)
            this.handleGetWidth()
            this.handleCheckWidth()
        },
        beforeDestroy () {
            off(window, 'resize', this.handleResize)
        },
        methods: {
            handleCheckWidth () {
                const $header = findComponentUpward(this, 'Header')
                if ($header) {
                    const headerWidth = parseInt(getStyle($header.$el, 'width'))
                    this.$nextTick(() => {
                        this.isLimit = headerWidth - this.maxWidth <= this.breadcrumbWidth
                    })
                }
            },
            handleGetWidth () {
                this.isLimit = false
                this.$nextTick(() => {
                    const $breadcrumb = this.$refs.breadcrumb
                    if ($breadcrumb) {
                        this.breadcrumbWidth = parseInt(getStyle($breadcrumb.$el, 'width'))
                    }
                })
            }
        }
    }
</script>
