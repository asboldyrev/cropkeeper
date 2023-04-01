import { dayjs, progressBar, router, bootstrap5 } from '@/bootstrap'

import { createApp } from 'vue'
import App from '@/App.vue'
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp(App)

app
	.provide('dayjs', dayjs)
	.provide('progressBar', progressBar)
	.provide('bootstrap', bootstrap5)
	.use(router)
	.use(pinia)
	.mount('#app')
