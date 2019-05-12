import Storage from './storage'
import { ACCESS_TOKEN } from '@/store/mutation-types'

export function getToken () {
  return Storage.get(ACCESS_TOKEN, undefined)
}

export function setToken (token) {
  return Storage.set(ACCESS_TOKEN, token, 3600 * 7)
}

export function removeToken () {
  return Storage.remove(ACCESS_TOKEN)
}
