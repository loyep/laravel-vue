import request from '@/utils/request'

export function getList (params = {}) {
  return request({
    url: '/role',
    method: 'get',
    params
  })
}

export function store (data = {}) {
  return request({
    url: '/role',
    method: 'post',
    data
  })
}

export function update (id, data = {}) {
  delete data['id']
  return request({
    url: '/role/' + id,
    method: 'post',
    data: data
  })
}

export function destroy (id) {
  return request({
    url: '/role/' + id,
    method: 'delete'
  })
}
