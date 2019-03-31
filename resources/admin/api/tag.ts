import request from '@/utils/request'

export function getList(params: object = {}) {
  return request({
    url: '/tag',
    method: 'get',
    params
  })
}

export function show(id: [string, number]) {
  return request({
    url: `/tag/${id}`,
    method: 'get',
  })
}

export function store(data: object = {}) {
  return request({
    url: '/tag',
    method: 'post',
    data
  })
}

export function update(id: [string, number], data: object) {
  return request({
    url: `/tag/${id}`,
    method: 'put',
    data
  })
}

export function destroy(id: number | string | Array<string | number>) {
  return request({
    url: `/tag/${id}`,
    method: 'delete'
  })
}
