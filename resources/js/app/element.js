import Vue from 'vue'

import lang from 'element-ui/lib/locale/lang/zh-CN'
import locale from 'element-ui/lib/locale'

import {
  Avatar,
  Badge,
  Dialog,
  Dropdown,
  DropdownMenu,
  DropdownItem,
  Input,
  Button,
  Tooltip,
  Form,
  FormItem,
  Icon,
  Card,
  Backtop,
  Loading,
  MessageBox,
  Notification
} from 'element-ui';

locale.use(lang)

Vue.use(Avatar)
Vue.use(Badge)
Vue.use(Dialog)
Vue.use(Dropdown)
Vue.use(DropdownMenu)
Vue.use(DropdownItem)
Vue.use(Input)
Vue.use(Button)
Vue.use(Tooltip)
Vue.use(Form)
Vue.use(FormItem)
Vue.use(Icon)
Vue.use(Card)
Vue.use(Backtop)

Vue.use(Loading.directive)

Vue.prototype.$ELEMENT = { size: 'medium' };

Vue.prototype.$loading = Loading.service
Vue.prototype.$msgbox = MessageBox
Vue.prototype.$alert = MessageBox.alert
Vue.prototype.$confirm = MessageBox.confirm
Vue.prototype.$prompt = MessageBox.prompt
Vue.prototype.$notify = Notification
