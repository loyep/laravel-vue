import request from '@/utils/request'

export function getList (params = {}) {
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

export function update (id, data) {
  return request({
    url: '/comment/' + id,
    method: 'put',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/comment/' + id,
    method: 'delete'
  })
}
