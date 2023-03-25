import Calendar from '@/Pages/Calendar.vue'
import Plots from '@/Pages/Plots.vue'
import Plants from '@/Pages/Plants.vue'
import Harvest from '@/Pages/Harvest.vue'
import Login from '@/Pages/Login.vue'
import Map from '@/Pages/Map.vue'
import Seeds from '@/Pages/Seeds.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import AuthLayout from '@/Layouts/AuthLayout.vue'

export default [
	{
		path: '/',
		component: AppLayout,
		children: [
			{
				path: '/',
				component: Map,
				name: 'map',
				meta: { title: 'Карта' }
			},
			{
				path: '/calendar',
				component: Calendar,
				name: 'calendar',
				meta: { title: 'Календарь' }
			},
			{
				path: '/plants',
				component: Plants,
				name: 'plants',
				meta: { title: 'Растения' }
			},
			{
				path: '/plots',
				component: Plots,
				name: 'plots',
				meta: { title: 'Участок' }
			},
			{
				path: '/seeds',
				component: Seeds,
				name: 'seeds',
				meta: { title: 'Семена' }
			},
			{
				path: '/harvest',
				component: Harvest,
				name: 'harvest',
				meta: { title: 'Урожай' }
			},
		]
	},
	{
		path: '/',
		component: AuthLayout,
		children: [
			{
				path: '/login',
				component: Login,
				name: 'login',
				meta: { title: 'Вход' }
			},
		]
	}

]
