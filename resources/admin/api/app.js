import request from '@/utils/request'

export function statistics (params = null) {
  return request({
    url: '/statistics',
    method: 'get',
    params
  })
}
