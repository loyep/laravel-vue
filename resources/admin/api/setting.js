import request from '@/utils/request'

export function getList (params) {
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

export function update (id, data) {
  return request({
    url: '/setting/' + id,
    method: 'post',
    data
  })
}

export function destroy (id) {
  return request({
    url: '/setting/' + id,
    method: 'delete'
  })
}
