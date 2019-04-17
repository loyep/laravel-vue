import request from '@/utils/request'

export function upload (data = {}) {
  return request({
    url: '/upload',
    method: 'post',
    data,
    headers: { 'Content-Type': 'multipart/form-data' }
  })
}

export function destroy (id) {
  return request({
    url: '/files/' + id,
    method: 'delete'
  })
}
