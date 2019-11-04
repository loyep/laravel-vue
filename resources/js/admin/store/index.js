import Vue from 'vue';
import Vuex from 'vuex';

const files = require.context('./modules', false, /\.js$/);
const modules = {};

files.keys().forEach(key => {
  modules[key.replace(/(\.\/|\.js)/g, '')] = files(key).default
});

Vue.use(Vuex);

export default new Vuex.Store({
  namespaced: true,
  modules
})
