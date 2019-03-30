import request from '@/utils/request'

export function getList(params: object = {}) {
  return request({
    url: '/user',
    method: 'get',
    params
  })
}

export function show(id: string | boolean) {
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

export function update(data) {
  const id = data.id
  return request({
    url: `/user/${id}`,
    method: 'post',
    data
  })
}

export function destroy(data) {
  const id = data.id
  return request({
    url: `/user/${id}`,
    method: 'delete'
  })
}
