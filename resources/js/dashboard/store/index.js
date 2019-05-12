import Vue from 'vue'
import Vuex from 'vuex'
import getters from './getters'

import app from './modules/app'
import auth from './modules/auth'
import permission from './modules/permission'
import theme from './modules/theme'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    auth,
    permission,
    theme
  },
  state: {},
  mutations: {},
  actions: {},
  getters
})

export default store
