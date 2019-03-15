import { getInfo, login, register, logout } from '@/api/auth'
import { getToken, removeToken, setToken } from '@/utils/auth'

// state
export const state = {
  user: null,
  token: getToken(),
  roles: []
}

export const mutations = {
  SET_TOKEN: (state, token) => {
    setToken(token)
    state.token = token
  },
  LOGOUT: (state) => {
    state.token = null
    state.roles = []
    /// 防止个人头像退出的瞬间获取不到
    setTimeout(() => {
      state.user = {}
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
    return new Promise((resolve, reject) => {
      commit('SET_TOKEN', token)
    })
  },
  // 注册
  Register ({ commit }, userInfo) {
    return new Promise((resolve, reject) => {
      register(userInfo).then(response => {
        const data = response.data
        if (data.token) {
          commit('SET_TOKEN', data.token)
          resolve(response)
        } else {
          reject(new Error())
        }
      }).catch(error => {
        reject(error)
      })
    })
  },
  // 登录
  Login ({ commit }, userInfo) {
    return new Promise((resolve, reject) => {
      login(userInfo).then(response => {
        const data = response.data
        if (data.token) {
          commit('SET_TOKEN', data.token)
          resolve(response)
        } else {
          reject(new Error())
        }
      }).catch(error => {
        reject(error)
      })
    })
  },
  // 获取用户信息
  GetInfo ({ commit }) {
    return new Promise((resolve, reject) => {
      getInfo().then(response => {
        const data = response.data

        if (data.roles && data.roles.length > 0) { // 验证返回的roles是否是一个非空数组
          commit('SET_ROLES', data.roles)
        } else {
          reject(new Error('getInfo: roles must be a non-null array !'))
        }
        commit('UPDATE_USER', data)
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  // 登出
  Logout ({ commit, state }) {
    return new Promise((resolve, reject) => {
      logout(state.token).then(() => {
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
