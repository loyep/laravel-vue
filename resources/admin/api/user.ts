import request from '@/utils/request'

export function index (params) {
  return request({
    url: '/user',
    method: 'get',
    params
  })
}

export function store (data) {
  return request({
    url: '/user',
    method: 'post',
    data
  })
}

export function update (data) {
  const id = data.id
  return request({
    url: `/user/${id}`,
    method: 'post',
    data
  })
}

export function destroy (data) {
  const id = data.id
  return request({
    url: `/user/${id}`,
    method: 'delete'
  })
}
