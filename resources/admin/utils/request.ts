import store from '@/store/index'
import { getToken, removeToken } from './auth'
import { notification } from 'ant-design-vue'
import axios, { AxiosError, AxiosRequestConfig, AxiosInstance, AxiosResponse, AxiosPromise } from 'axios'

const axiosRequestConfig: AxiosRequestConfig = {
  baseURL: 'api', // api 的 base_url
  timeout: 5000, // 请求超时时间
  withCredentials: true,  // 携带cookie信息
};

const axiosInstance: AxiosInstance = axios.create(axiosRequestConfig);

// request拦截器
axiosInstance.interceptors.request
.use((request: AxiosRequestConfig) => {
    const token = getToken()
    if (token) {
      request.headers.common['Authorization'] = token
    }
    return request
  },
  (error: AxiosError) => {
    return Promise.reject(error)
  })

axiosInstance.interceptors.response.use(
  (response: AxiosResponse) => {
    const token = response.headers.authorization
    if (token) {
      store.dispatch('auth/RefreshToken', token)
    }
    return response
  },
  (error: AxiosError) => {
    switch (error.response!.status) {
      case 401: {
        if (store.getters['auth/check'] === true) {
          store.commit('auth/LOGOUT')
          location.reload()
        }
        break
      }
      case 400:
        return notification.error({
          message: '错误',
          description: error.response!.data.error
        })
      default:
        break
    }
    return Promise.reject(error)
  })

export default function request(config: AxiosRequestConfig) : AxiosPromise {
  return axiosInstance(config);
}
