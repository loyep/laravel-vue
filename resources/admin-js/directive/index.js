import directive from './directives'

const importDirective = Vue => {
  /**
   * 拖拽指令 v-permission="options"
   * options = {
   *
   * }
   */
  Vue.directive('permission', directive.permission)
}

export default importDirective
