import VueStorage from 'vue-ls'
import Vue from 'vue'

Vue.use(VueStorage, {
  namespace: 'grace__', // key prefix
  name: 'ls', // name variable Vue.[ls] or this.[$ls],
  storage: 'local' // storage name session, local, memory
})

export const setStore = (key, content, expires = 60 * 60 * 7) => {
  if (typeof content !== 'string') {
    content = JSON.stringify(content)
  }
  Vue.ls.set(key, content, expires)
}

export const getStore = (key, def = null) => {
  let content = Vue.ls.get(key)
  if (content !== null && content !== undefined) {
    try {
      content = JSON.parse(content)
    } catch (e) {
      return content
    }
    return content
  }

  return def
}

export const removeStore = (key) => {
  Vue.ls.remove(key)
}

export const clearStore = () => {
  Vue.ls.clear()
}

const Storage = {
  get: getStore,
  set: setStore,
  remove: removeStore,
  clear: clearStore
}

export default Storage
