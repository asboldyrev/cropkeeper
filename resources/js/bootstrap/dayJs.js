import localizedFormat from 'dayjs/plugin/localizedFormat'
import dayjs from 'dayjs'
import ruLocale from 'dayjs/locale/ru'

dayjs.locale(ruLocale)
dayjs.extend(localizedFormat)

export { dayjs as dayjs }
