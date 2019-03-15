import request from '@/utils/request'

export function index (params) {
  return request({
    url: '/role',
    method: 'get',
    params
  })
}

export function store (data) {
  return request({
    url: '/role',
    method: 'post',
    data
  })
}

export function update (data) {
  const id = data.id
  return request({
    url: `/role/${id}`,
    method: 'post',
    data
  })
}

export function destroy (data) {
  const id = data.id
  return request({
    url: `/role/${id}`,
    method: 'delete'
  })
}
