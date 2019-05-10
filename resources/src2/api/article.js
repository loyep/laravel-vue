import request from '@/utils/request'

export function getList (params = {}) {
  return request({
    url: '/article',
    method: 'get',
    params
  })
}

export function store (data) {
  return request({
    url: '/article',
    method: 'post',
    data
  })
}

export function update (id, data) {
  delete data['id']
  return request({
    url: '/article/' + id,
    method: 'post',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/article/' + id,
    method: 'delete'
  })
}
