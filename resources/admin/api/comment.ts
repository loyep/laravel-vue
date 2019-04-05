import request from '@/utils/request'

export function getList (params: object = {}) {
  return request({
    url: '/comment',
    method: 'get',
    params
  })
}

export function store (data: object) {
  return request({
    url: '/comment',
    method: 'post',
    data
  })
}

export function update(id: [string, number], data: object) {
  return request({
    url: `/comment/${id}`,
    method: 'put',
    data
  })
}

export function destroy(id: number | string | Array<string | number>) {
  return request({
    url: `/comment/${id}`,
    method: 'delete'
  })
}
