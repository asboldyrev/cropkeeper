import api from '@/Api/request'

export default {
	list(data) {
		return api.request('plants/list', data)
	},
	store(data) {
		return api.request('plants/store', data)
	},
	show(uuid) {
		return api.request(`plants/show/${uuid}`)
	},
	update(uuid, data) {
		return api.request(`plants/update/${uuid}`, data)
	},
	delete(uuid) {
		return api.request(`plants/delete/${uuid}`)
	}
}
