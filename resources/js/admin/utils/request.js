import axios from 'axios'

const token = document.head.querySelector('meta[name="csrf-token"]').content;

// 创建一个 axios 实例
const instance = axios.create({
  baseURL: '/',
  timeout: 5000,
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': token
  }
});

// 请求拦截器
instance.interceptors.request.use(
  config => config,
  error => {
    // 发送失败
    return Promise.reject(error);
  }
);

function filterErrors (ResErr) {
  if (ResErr instanceof Object) {
    const errors = Object.assign({}, ResErr)
    Object.keys(errors).forEach(error => {
      const message = errors[error]
      if (message instanceof Array) {
        errors[error] = message[0]
      } else if (message instanceof String) {
          errors[error] = message
      }
    })
    return errors
  }
  return ResErr
}

// 响应拦截器
instance.interceptors.response.use(
  response => {
    return response.data;
  },
  error => {
    const { response } = error
    if (response && response.data && response.data.errors) {
      response.data.errors = filterErrors(response.data.errors)
    }

    switch (response.status) {
      case 401:
        if (response.status === 401 && response.data.error.message !== 'Unauthorized') {
          return Promise.reject(response);
        }
        window.location = '/login';
        break;
      case 429:
        break;
      case 422:
        break;
      default: break;
    }
    return Promise.reject(response.data);
  });

export const request = instance;

export default function install (Vue) {
  Object.defineProperty(Vue.prototype, '$http', {
    get () {
      return instance
    }
  })
}
