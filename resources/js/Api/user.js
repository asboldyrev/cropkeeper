import api from '@/Api/request'

export default {
	show() {
		return api.request(`users/show`)
	},
	update(data) {
		return api.request(`users/update`, data)
	},
}
