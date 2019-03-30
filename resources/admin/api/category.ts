import request from '@/utils/request'

export function getList(params: object) {
  return request({
    url: '/category',
    method: 'get',
    params
  })
}

export function store(data: object) {
  return request({
    url: '/category',
    method: 'post',
    data
  })
}

export function update(data = { id: undefined}) {
  let id = undefined;
  if (data.hasOwnProperty('id')) {
    id = data['id']
  }
  return request({
    url: `/category/${id}`,
    method: 'post',
    data
  })
}

export function destroy(data: object) {
  let id = undefined;
  if (data.hasOwnProperty('id')) {
    id = data['id']
  }
  return request({
    url: `/category/${id}`,
    method: 'delete'
  })
}
