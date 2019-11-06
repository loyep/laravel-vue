/**
 * 布局配置
 * */
import screenfull from 'screenfull'

export default {
  namespaced: true,
  state: {
    info: {}
  },
  mutations: {
    /**
     * @description 设置用户数据
     * @param {Object} state vuex state
     * @param {Object} dispatch vuex dispatch
     * @param {*} info info
     */
    set (state, info) {
      return new Promise(async resolve => {
          // store 赋值
          state.info = info;
          resolve();
      })
    },
    /**
     * @description 修改 menuCollapse
     * @param {Object} state vuex state
     * @param {Boolean} collapse 折叠状态
     * */
    updateMenuCollapse (state, collapse) {
      state.menuCollapse = collapse
    },
    /**
     * @description 设置全屏状态
     * @param {Object} state vuex state
     * @param {Boolean} isFullscreen vuex
     * */
    setFullscreen (state, isFullscreen) {
      state.isFullscreen = isFullscreen
    },
    /**
     * @description 更改指定布局配置
     * @param {Object} state vuex state
     * @param {Object} key layout 名称，对应 Setting.layout
     * @param {Object} value layout 值
     * */
    updateLayoutSetting (state, { key, value }) {
      console.log({ key, value })
      state[key] = value
    }
  },
  actions: {
    /**
         * @description 初始化监听全屏状态
         */
    listenFullscreen ({ commit }) {
      return new Promise(resolve => {
        if (screenfull.enabled) {
          screenfull.on('change', () => {
            if (!screenfull.isFullscreen) {
              commit('setFullscreen', false)
            }
          })
        }
        // end
        resolve()
      })
    },
    /**
         * @description 切换全屏
         */
    toggleFullscreen ({ commit }) {
      return new Promise(resolve => {
        if (screenfull.isFullscreen) {
          screenfull.exit()
          commit('setFullscreen', false)
        } else {
          screenfull.request()
          commit('setFullscreen', true)
        }
        // end
        resolve()
      })
    }
  }
}
