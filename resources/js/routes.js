import Calendar from '@/Views/Calendar.vue'
import Garden from '@/Views/Garden.vue'
import Harvest from '@/Views/Harvest.vue'
import Login from '@/Views/Login.vue'
import Map from '@/Views/Map.vue'
import Seeds from '@/Views/Seeds.vue'

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
