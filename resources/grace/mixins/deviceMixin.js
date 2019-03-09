import { DEVICE_TYPE } from '@/utils/device'
import { mapState } from 'vuex'

const deviceMixin = {
  computed: {
    ...mapState({
      device: state => state.app.device
    }),

    isMobile () {
      return this.device === DEVICE_TYPE.MOBILE
    },

    isDesktop () {
      return this.device === DEVICE_TYPE.DESKTOP
    },

    isTablet () {
      return this.device === DEVICE_TYPE.TABLET
    }

  }
}

export default deviceMixin
