import request from '@/utils/request'

export function getList (params: object = {}) {
  return request({
    url: '/post',
    method: 'get',
    params
  })
}

export function store (data: object) {
  return request({
    url: '/post',
    method: 'post',
    data
  })
}

export function update (data: object) {
  let id = undefined;
  if (data.hasOwnProperty('id')) {
    id = data['id'] 
  }
  return request({
    url: `/post/${id}`,
    method: 'post',
    data
  })
}

export function destroy (data: object) {
  let id = undefined;
  if (data.hasOwnProperty('id')) {
    id = data['id'] 
  }  
  return request({
    url: `/post/${id}`,
    method: 'delete'
  })
}
