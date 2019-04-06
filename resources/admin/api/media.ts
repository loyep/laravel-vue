import request from '@/utils/request'

export function upload(data: object = {}) {
  return request({
    url: '/upload',
    method: 'post',
    data,
    headers: { 'Content-Type': 'multipart/form-data' }
  })
}

export function destroy(id: number | string | Array<string | number>) {
  return request({
    url: `/user/${id}`,
    method: 'delete'
  })
}
