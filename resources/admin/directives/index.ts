import directive from './directives'
import Vue from 'vue'

function importDirective () {
  /**
   * 拖拽指令 v-permission="options"
   * options = {
   *
   * }
   */
  Vue.directive('permission', directive.permission)
}

export default importDirective
