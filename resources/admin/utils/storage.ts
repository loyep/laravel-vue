import VueStorage from 'vue-ls'
import Vue from 'vue'

Vue.use(VueStorage, {
  namespace: 'prism__', // key prefix
  name: 'ls', // name variable Vue.[ls] or this.[$ls],
  storage: 'local' // storage name session, local, memory
})

/**
 *
 * @param key
 * @param content
 * @param expires 1 week
 */
export function setStore (name: string, value: string|any, expire: number = 604800) {
  const stringifyValue = JSON.stringify({
    value,
    expire: expire !== null ? new Date().getTime() + expire * 1000 : null,
  });

  localStorage.setItem(name, stringifyValue);
}

export function getStore (name: string, def: any = null) : any {
  const item = localStorage.getItem(name);

  if (item !== null) {
    try {
      const data = JSON.parse(item);

      if (data.expire === null) {
        return data.value;
      }

      if (data.expire >= new Date().getTime()) {
        return data.value;
      }

      localStorage.remove(name);
    } catch (err) {
      return def;
    }
  }

  return def;
}

export function removeStore (name: string) {
  localStorage.removeItem(name)
}

export function clearStore () {
  localStorage.clear()
}

const Storage = {
  get: getStore,
  set: setStore,
  remove: removeStore,
  clear: clearStore
}

export default Storage
