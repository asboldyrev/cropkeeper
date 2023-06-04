import api from '@/Api/request'

export default {
	list() {
		return api.request('planting_methods/list')
	}
}
