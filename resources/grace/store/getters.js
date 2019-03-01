const getters = {
  device: state => state.app.device,
  locale: state => state.app.locale,
  color: state => state.app.color
  // token: state => state.user.token,
  // avatar: state => state.user.avatar,
  // nickname: state => state.user.name,
  // welcome: state => state.user.welcome,
  // roles: state => state.user.roles,
  // addRouters: state => state.permission.addRouters,
}

export default getters
