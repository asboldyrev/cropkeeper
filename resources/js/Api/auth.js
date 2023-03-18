import api from './request'

export default {
	getToken(data) {
		return api.request('auth/get-token', data)
	},
	checkToken(token) {
		return api.request('auth/check-token', { token }, token = token)
	},
	forgetToken(token) {
		return api.request('auth/forget-token', { token })
	},
	forgotTokens() {
		return api.request('auth/forgot-tokens')
	},

}
