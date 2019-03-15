import request from '@/utils/request'

export function login (data) {
  return request({
    url: '/login',
    method: 'post',
    data
  })
}

export function register (data) {
  return request({
    url: '/register',
    method: 'post',
    data
  })
}

export function logout () {
  return request({
    url: '/logout',
    method: 'post'
  })
}

export function getInfo () {
  return request({
    url: '/user/profile',
    method: 'get'
  })
}
