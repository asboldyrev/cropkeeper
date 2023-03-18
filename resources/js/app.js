import './bootstrap'

import { createApp } from 'vue'
import App from './App.vue'
import routes from './routes'
import { createPinia } from 'pinia'
import { createRouter, createWebHistory } from 'vue-router'
import { useStore } from './store'
import authApi from './Api/auth'

import 'remixicon/fonts/remixicon.css'

const pinia = createPinia()

const router = createRouter({
	history: createWebHistory(),
	routes,
})

router.beforeEach(async (to, from, next) => {
	const store = useStore()

	const isLoginRoute = to.name == 'login'
	let localToken = localStorage.getItem('token')
	let isLoggedIn = false

	if (localToken && !store.token) {
		await authApi
			.checkToken(localToken)
			.then(response => {
				if (response.check) {
					isLoggedIn = true
					store.setToken(localToken)
				}
			})
			.catch(() => {
				next({ name: 'login' })
			});
	}

	if (isLoginRoute && ((localToken && isLoggedIn) || store.token)) {
		next({ name: 'map' })
	}

	if (isLoginRoute || (localToken && isLoggedIn) || store.token) {
		next()
	} else {
		next({ name: 'login' })
	}
})

const app = createApp(App)

app.use(router).use(pinia).mount('#app')
