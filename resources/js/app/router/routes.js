import Login from '../views/Login';
import Register from '../views/Register';
import RestPass from '../views/RestPass';
import Profile from '../views/Profile';

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
