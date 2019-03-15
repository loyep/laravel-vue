import request from '@/utils/request'

export function statistics (params) {
  return request({
    url: '/statistics',
    method: 'get',
    params
  })
}
