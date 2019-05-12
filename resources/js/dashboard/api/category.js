import request from '@/utils/request'

export function getList (params) {
  return request({
    url: '/category',
    method: 'get',
    params
  })
}

export function show (id) {
  return request({
    url: '/category/' + id,
    method: 'get'
  })
}

export function store (data) {
  return request({
    url: '/category',
    method: 'post',
    data
  })
}

export function update (id, data) {
  return request({
    url: '/category/' + id,
    method: 'put',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/category/' + id,
    method: 'delete'
  })
}
