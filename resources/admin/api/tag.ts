import request from '@/utils/request'

export function getList (params: object = {}) {
  return request({
    url: '/tag',
    method: 'get',
    params
  })
}

export function store (data: object = {}) {
  return request({
    url: '/tag',
    method: 'post',
    data
  })
}

export function update (data) {
  const id = data.id
  return request({
    url: `/tag/${id}`,
    method: 'post',
    data
  })
}

export function destroy (data) {
  const id = data.id
  return request({
    url: `/tag/${id}`,
    method: 'delete'
  })
}
