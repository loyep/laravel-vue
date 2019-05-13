import './ant-design'
import '@/utils/storage'

import { preloaderFinished } from '@/utils/preloader'

const Initializer = () => {
  preloaderFinished()
}

export default Initializer
