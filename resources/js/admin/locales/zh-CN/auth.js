const messages = {
  validation: {
    email: {
      required: '请输入邮箱地址或用户名！',
      'wrong-format': '格式错误'
    },
    name: {
      required: '请输入用户名'
    },
    password: {
      required: '请输入密码！'
    },
    confirm_password: {
      required: '请确认密码！'
    }
  },
  form: {
    email: {
      placeholder: '邮箱'
    },
    name: {
      placeholder: '用户名'
    },
    password: {
      placeholder: '至少6位密码，区分大小写'
    },
    confirm_password: {
      placeholder: '确认密码'
    }
  },
  register: {
    register: '注册',
    login: '使用已有账户登录'
  }
}

export default messages
