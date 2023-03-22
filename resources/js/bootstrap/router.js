import routes from '@/routes'
import { createRouter, createWebHistory } from 'vue-router'
import { useToken } from '@/store/token'
import authApi from '@/Api/auth'

const router = createRouter({
	history: createWebHistory(),
	routes,
})

router.beforeEach(async (to, from, next) => {
	const store = useToken()

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

window.router = router
