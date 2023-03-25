import { dayjs, progressBar, router } from '@/bootstrap'

import { createApp } from 'vue'
import App from '@/App.vue'
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp(App)

app
	.provide('dayjs', dayjs)
	.provide('progressBar', progressBar)
	.use(router)
	.use(pinia)
	.mount('#app')
