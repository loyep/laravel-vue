import Cookies from 'js-cookie'

export const setCookie = (key, content, expires = 7) => {
  if (typeof content !== 'string') {
    content = JSON.stringify(content)
  }
  Cookies.set(key, content, { expires })
}

export const getCookie = (key, def = null) => {
  let content = Cookies.get(key)
  if (content !== null && content !== undefined) {
    try {
      content = JSON.parse(content)
    } catch (e) {
      return content
    }
    return content
  }

  return def
}

export const removeCookie = (key) => {
  Cookies.remove(key)
}

export const clearCookie = () => {
  Cookies.clear()
}

const Cookie = {
  get: getCookie,
  set: setCookie,
  remove: removeCookie,
  clear: clearCookie
}

export default Cookie
