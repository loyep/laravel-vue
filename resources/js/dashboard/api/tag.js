import request from '@/utils/request'

export function getList (params = {}) {
  return request({
    url: '/tag',
    method: 'get',
    params
  })
}

export function show (id) {
  return request({
    url: '/tag/' + id,
    method: 'get'
  })
}

export function store (data = {}) {
  return request({
    url: '/tag',
    method: 'post',
    data
  })
}

export function update (id, data) {
  return request({
    url: '/tag/' + id,
    method: 'put',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/tag/' + id,
    method: 'delete'
  })
}
