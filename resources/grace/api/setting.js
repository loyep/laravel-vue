import request from '@/utils/request'

export function index (params) {
  return request({
    url: '/setting',
    method: 'get',
    params
  })
}

export function store (data) {
  return request({
    url: '/setting',
    method: 'post',
    data
  })
}

export function update (data) {
  const id = data.id
  return request({
    url: `/setting/${id}`,
    method: 'post',
    data
  })
}

export function destroy (data) {
  const id = data.id
  return request({
    url: `/setting/${id}`,
    method: 'delete'
  })
}
