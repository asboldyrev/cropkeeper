import '@/bootstrap'

import { createApp } from 'vue'
import App from '@/App.vue'
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp(App)

app
	.provide('dayJs', dayjs)
	.use(router)
	.use(pinia)
	.mount('#app')
