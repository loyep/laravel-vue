import Cookie from './cookie'
import { ACCESS_TOKEN } from '@/store/mutation-types'

export const getToken = () => {
  return Cookie.get(ACCESS_TOKEN)
}

export const setToken = (token) => {
  return Cookie.set(ACCESS_TOKEN, token)
}

export const removeToken = () => {
  return Cookie.remove(ACCESS_TOKEN)
}
