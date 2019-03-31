import request from '@/utils/request'

export function getList(params: object = {}) {
  return request({
    url: '/post',
    method: 'get',
    params
  })
}

export function store(data: object) {
  return request({
    url: '/post',
    method: 'post',
    data
  })
}

export function update(id: number | string, data: object) {
  delete data['id'];
  return request({
    url: `/post/${id}`,
    method: 'post',
    data
  })
}

export function destroy(id: number | string | Array<string | number>) {
  return request({
    url: `/post/${id}`,
    method: 'delete'
  })
}