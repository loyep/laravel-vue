import request from '@/utils/request'

export function login (data: Object) {
  return request({
    url: '/login',
    method: 'post',
    data
  })
}

export function passwordEmail (data: Object) {
  return request({
    url: '/password/email',
    method: 'post',
    data: data
  })
}

export function register (data: Object) {
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
