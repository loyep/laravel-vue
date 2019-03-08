import enquireJs from 'enquire.js'

export const DEVICE_TYPE = {
  DESKTOP: 'desktop',
  TABLET: 'tablet',
  MOBILE: 'mobile'
}

export const SCREEN_TYPE = {
  SCREEN_XS: 'screen-xs',
  SCREEN_SM: 'screen-sm',
  SCREEN_MD: 'screen-md',
  SCREEN_LG: 'screen-lg',
  SCREEN_XL: 'screen-xl',
  SCREEN_XXL: 'screen-xxl'
}

export const deviceEnquire = (callback) => {
  const matchDesktop = {
    match: () => {
      callback && callback(DEVICE_TYPE.DESKTOP)
    }
  }

  const matchLablet = {
    match: () => {
      callback && callback(DEVICE_TYPE.TABLET)
    }
  }

  const matchMobile = {
    match: () => {
      callback && callback(DEVICE_TYPE.MOBILE)
    }
  }

  const matchScreenXS = {
    match: () => {
      callback && callback(SCREEN_TYPE.SCREEN_XS)
    }
  }

  const matchScreenSM = {
    match: () => {
      callback && callback(SCREEN_TYPE.SCREEN_SM)
    }
  }

  const matchScreenMD = {
    match: () => {
      callback && callback(SCREEN_TYPE.SCREEN_MD)
    }
  }

  const matchScreenLG = {
    match: () => {
      callback && callback(SCREEN_TYPE.SCREEN_LG)
    }
  }

  const matchScreenXL = {
    match: () => {
      callback && callback(SCREEN_TYPE.SCREEN_XL)
    }
  }
  const matchScreenXXL = {
    match: () => {
      callback && callback(SCREEN_TYPE.SCREEN_XXL)
    }
  }
  enquireJs
    .register('screen and (max-width: 576px)', matchScreenXS)
    .register('screen and (min-width: 576px) and (max-width: 768px)', matchScreenSM)
    .register('screen and (min-width: 768px) and (max-width: 992px)', matchScreenMD)
    .register('screen and (min-width: 992px) and (max-width: 1200px)', matchScreenLG)
    .register('screen and (min-width: 1200px) and (max-width: 1600px)', matchScreenXL)
    .register('screen and (min-width: 1600px)', matchScreenXXL)
}
