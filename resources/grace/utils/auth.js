import Storage from './storage'
import { ACCESS_TOKEN } from '@/store/mutation-types'

export const getToken = () => {
  return Storage.get(ACCESS_TOKEN, null)
}

export const setToken = (token) => {
  return Storage.set(ACCESS_TOKEN, token, 3600 * 7)
}

export const removeToken = () => {
  return Storage.remove(ACCESS_TOKEN)
}
