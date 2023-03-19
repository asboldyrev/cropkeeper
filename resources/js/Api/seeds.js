import api from './request'

export default {
	list(gardenUuid) {
		return api.request('seeds/list', {garden_uuid: gardenUuid})
	},
	store(data) {
		return api.request('seeds/store', data)
	},
	show(uuid) {
		return api.request(`seeds/show/${uuid}`)
	},
	update(uuid, data) {
		return api.request(`seeds/update/${uuid}`, data)
	},
	delete(uuid) {
		return api.request(`seeds/delete/${uuid}`)
	}
}
