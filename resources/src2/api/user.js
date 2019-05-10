import request from '@/utils/request'

export function getList (params = {}) {
  return request({
    url: '/user',
    method: 'get',
    params
  })
}

export function show (id) {
  return request({
    url: '/user/' + id,
    method: 'get'
  })
}

export function store (data = {}) {
  return request({
    url: '/user',
    method: 'post',
    data
  })
}

export function update (id, data) {
  return request({
    url: '/user/' + id,
    method: 'put',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/user/' + id,
    method: 'delete'
  })
}
