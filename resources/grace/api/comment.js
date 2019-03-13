import request from '@/utils/request'

export function index (params) {
  return request({
    url: '/comment',
    method: 'get',
    params
  })
}

export function store (data) {
  return request({
    url: '/comment',
    method: 'post',
    data
  })
}

export function update (data) {
  const id = data.id
  return request({
    url: `/comment/${id}`,
    method: 'post',
    data
  })
}

export function destroy (data) {
  const id = data.id
  return request({
    url: `/comment/${id}`,
    method: 'delete'
  })
}
