import request from '@/utils/request'

export function getList(params: object = {}) {
  return request({
    url: '/user',
    method: 'get',
    params
  })
}

export function show(id: [string, number]) {
  return request({
    url: `/user/${id}`,
    method: 'get',
  })
}

export function store(data: object = {}) {
  return request({
    url: '/user',
    method: 'post',
    data
  })
}

export function update(id: [string, number], data: object) {
  return request({
    url: `/user/${id}`,
    method: 'put',
    data
  })
}

export function destroy(id: number | string | Array<string | number>) {
  return request({
    url: `/user/${id}`,
    method: 'delete'
  })
}
