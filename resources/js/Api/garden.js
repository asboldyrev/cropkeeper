import api from './request'

export default {
	list() {
		return api.request('gardens/list')
	},
	store(data) {
		return api.request('gardens/store', data)
	},
	show(uuid) {
		return api.request(`gardens/show/${uuid}`)
	},
	update(uuid, data) {
		return api.request(`gardens/update/${uuid}`, data)
	},
	delete(uuid) {
		return api.request(`gardens/delete/${uuid}`)
	}
}
