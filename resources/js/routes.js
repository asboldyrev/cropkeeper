import Calendar from '@/Pages/Calendar.vue'
import Garden from '@/Pages/Garden.vue'
import Harvest from '@/Pages/Harvest.vue'
import Login from '@/Pages/Login.vue'
import Map from '@/Pages/Map.vue'
import Seeds from '@/Pages/Seeds.vue'

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
	{
		path: '/calendar',
		component: Calendar,
		name: 'calendar',
		meta: { title: 'Календарь' }
	},
	{
		path: '/garden',
		component: Garden,
		name: 'garden',
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
