import api from '@/Api/request'

export default {
	list(gardenUuid) {
		return api.request('plots/list', {garden_uuid: gardenUuid})
	},
	store(data) {
		return api.request('plots/store', data)
	},
	show(uuid) {
		return api.request(`plots/show/${uuid}`)
	},
	update(uuid, data) {
		return api.request(`plots/update/${uuid}`, data)
	},
	delete(uuid) {
		return api.request(`plots/delete/${uuid}`)
	}
}
