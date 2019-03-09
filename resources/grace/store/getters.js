const getters = {
  device: state => state.theme.device,
  locale: state => state.app.locale,
  color: state => state.theme.color,
  // token: state => state.user.token,
  // avatar: state => state.user.avatar,
  // welcome: state => state.user.welcome,
  roles: state => state.auth.roles
  // addRouters: state => state.permission.addRouters,
}

export default getters
