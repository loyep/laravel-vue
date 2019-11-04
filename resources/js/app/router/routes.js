// import Login from '../views/Login';
// import Register from '../views/Register';
// import RestPass from '../views/RestPass';
// import Profile from '../views/Profile';
const Login = () => import(/* webpackChunkName: "login" */ '../views/Login.vue')
const Register = () => import(/* webpackChunkName: "register" */ '../views/Register.vue')
const RestPass = () => import(/* webpackChunkName: "restPass" */ '../views/RestPass.vue')
const Profile = () => import(/* webpackChunkName: "profile" */ '../views/Profile.vue')

const routes = [
  {
      path: '/login',
      component: Login
  },
  {
      path: '/register',
      component: Register
  },
  {
      path: '/password/reset',
      component: RestPass
  },
  {
      path: '/profile',
      component: Profile
  }
]

export default routes
