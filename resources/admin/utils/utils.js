export function getBaseUrl () {
  return window.config.base ? window.config.base : '/admin'
}

// eslint-disable-next-line no-useless-escape
const reg = /(((^https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+(?::\d+)?|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)$/
export function isUrl (path) {
  return reg.test(path)
}
