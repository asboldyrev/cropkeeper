import './bootstrap'

import { createApp } from 'vue'
import App from './App.vue'
import routes from './routes'
import { createPinia } from 'pinia'
import { createRouter, createWebHistory } from 'vue-router'
import { useStore } from './store'

import 'remixicon/fonts/remixicon.css'

const pinia = createPinia()

const router = createRouter({
	history: createWebHistory(),
	routes,
})

const app = createApp(App)

app.use(router).use(pinia).mount('#app')
