import { getInfo, login, register, logout } from '@/api/auth'
import { getToken, removeToken, setToken } from '@/utils/auth'

// state
export const state = {
  user: undefined,
  token: getToken(),
  roles: []
}

export const mutations = {
  SET_TOKEN: (state, token) => {
    setToken(token)
    state.token = token
  },
  LOGOUT: (state) => {
    state.token = undefined
    state.roles = []
    /// 防止个人头像退出的瞬间获取不到
    setTimeout(() => {
      state.user = undefined
    }, 100)
    removeToken()
  },
  SET_ROLES: (state, roles) => {
    state.roles = roles
  },
  UPDATE_USER: (state, user) => {
    state.user = user
  }
}

export const actions = {
  // 将刷新的 token 保存至本地
  RefreshToken ({ commit }, token) {
    commit('SET_TOKEN', token)
  },
  // 注册
  Register ({ commit }, userInfo) {
    return new Promise((resolve, reject) => {
      register(userInfo).then(res => {
        const { data } = res.data

        if (data.token) {
          commit('SET_TOKEN', data.token)
          resolve(res)
        } else {
          reject(res.data.errors)
        }
      }).catch(error => {
        reject(error)
      })
    })
  },
  // 登录
  Login ({ commit }, userInfo) {
    return new Promise((resolve, reject) => {
      login(userInfo).then(res => {
        const { data, errors } = res.data

        if (data && data.token) {
          commit('SET_TOKEN', data.token)
          resolve(res)
        } else {
          reject(errors)
        }
      }).catch(error => {
        reject(error)
      })
    })
  },
  // 获取用户信息
  GetInfo ({ commit }) {
    return new Promise((resolve, reject) => {
      getInfo().then(res => {
        const { data } = res.data

        // 验证返回的roles是否是一个非空数组
        if (data && data.roles && data.roles.length > 0) {
          commit('SET_ROLES', data.roles)
        } else {
          reject(new Error(data.errors))
        }

        commit('UPDATE_USER', data)

        resolve(res.data)
      }).catch(error => {
        reject(error)
      })
    })
  },
  // 登出
  Logout ({ commit }) {
    return new Promise((resolve, reject) => {
      logout().then(() => {
        commit('LOGOUT')
        resolve()
      }).catch(() => {
        commit('LOGOUT')
        resolve()
      })
    })
  }
}

export const getters = {
  user: state => state.user,
  check: state => state.user != null,
  token: state => state.token,
  roles: state => state.roles
}

const auth = {
  namespaced: true,
  state: state,
  actions: actions,
  mutations: mutations,
  getters: getters
}

export default auth
