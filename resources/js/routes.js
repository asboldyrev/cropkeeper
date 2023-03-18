import Login from '@/Views/Login.vue'
import Map from '@/Views/Map.vue'

export default [
	{
		path: '/login',
		component: Login,
		name: 'login',
		meta: { title: 'Вход' }
	},
	{
		path: '/',
		component: Map,
		name: 'map',
		meta: { title: 'Карта' }
	},
]
