import Calendar from '@/Pages/Calendar.vue'
import Dashboard from '@/Pages/Dashboard.vue'
import Harvest from '@/Pages/Harvest.vue'
import Login from '@/Pages/Login.vue'
import Logout from '@/Pages/Logout.vue'
import Plants from '@/Pages/Plants.vue'
import Plots from '@/Pages/Plots.vue'
import Profile from '@/Pages/Profile.vue'
import Seeds from '@/Pages/Seeds.vue'

import AccountLayout from '@/Layouts/AccountLayout.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import AuthLayout from '@/Layouts/AuthLayout.vue'

export default [
	{
		path: '/',
		component: AppLayout,
		name: 'app-layout',
		children: [
			{
				path: '/',
				component: Dashboard,
				name: 'dashboard',
				meta: {
					title: 'Сводка',
					name: 'Сводка',
					icon: 'ri-dashboard-line',
				}
			},
			{
				path: '/calendar',
				component: Calendar,
				name: 'calendar',
				meta: {
					title: 'Календарь',
					name: 'Календарь',
					icon: 'ri-calendar-line',
				}
			},
			{
				path: '/plants',
				component: Plants,
				name: 'plants',
				meta: {
					title: 'Растения',
					name: 'Растения',
					icon: 'ri-plant-line',
				}
			},
			{
				path: '/seeds',
				component: Seeds,
				name: 'seeds',
				meta: {
					title: 'Семена',
					name: 'Семена',
					icon: 'ri-seedling-line',
				}
			},
			{
				path: '/harvest',
				component: Harvest,
				name: 'harvest',
				meta: {
					title: 'Урожай',
					name: 'Урожай',
					icon: 'ri-shopping-basket-line',
				}
			},
			{
				path: '/plots',
				component: Plots,
				name: 'plots',
				meta: {
					title: 'Участок',
					name: 'Участок',
					icon: 'ri-shape-line',
				}
			},
		]
	},

	{
		path: '/',
		component: AccountLayout,
		name: 'account-layout',
		children: [
			{
				path: '/profile',
				component: Profile,
				name: 'profile',
				meta: {
					title: 'Профиль',
					name: 'Профиль',
					icon: 'ri-user-line',
				}
			},
		]
	},
	{
		path: '/',
		component: AuthLayout,
		name: 'auth-layout',
		children: [
			{
				path: '/login',
				component: Login,
				name: 'login',
				meta: { title: 'Вход' }
			},
			{
				path: '/logout',
				component: Logout,
				name: 'logout',
				meta: { title: 'Выход' }
			},
		]
	}

]
