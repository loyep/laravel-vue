import request from '@/utils/request'

export function getList (params = {}) {
  return request({
    url: '/post',
    method: 'get',
    params
  })
}

export function store (data) {
  return request({
    url: '/post',
    method: 'post',
    data
  })
}

export function update (id, data) {
  delete data['id']
  return request({
    url: '/post/' + id,
    method: 'post',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/post/' + id,
    method: 'delete'
  })
}
