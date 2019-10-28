import VueStorage from 'vue-ls'
import Vue from 'vue'

Vue.use(VueStorage, {
    namespace: 'dawn__', // key prefix
    name: 'ls', // name variable Vue.[ls] or this.[$ls],
    storage: 'local' // storage name session, local, memory
})

const storage = {};

/**
 * @description 存储 storage 值
 * @param {String} name storage name
 * @param {String} value storage value
 * @param {Number} seconds storage seconds
 */
storage.set = function (name = 'default', value = '', seconds = 3600 * 7) {
    if (typeof value !== 'string') {
        value = JSON.stringify(value)
    }
    Vue.ls.set(name, value, seconds * 1000)
};

/**
 * @description 拿到 storage 值
 * @param {String} name storage name
 * @param {String} def storage 默认值
 */
storage.get = function (name = 'default', def = '') {
    let value = Vue.ls.get(name)
    if (value !== null && value !== undefined) {
        try {
            value = JSON.parse(value)
        } catch (e) {
            return value
        }
        return value
    }

    return def
};

/**
 * @description 清空 storage 全部的值
 */
storage.clear = function () {
    return Vue.ls.clear();
};

/**
 * @description 删除 storage
 * @param {String} name storage name
 */
storage.remove = function (name = 'default') {
    return Vue.ls.remove(name)
};

export default storage;
