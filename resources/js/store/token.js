import { computed, ref } from 'vue'

export function useToken() {
	const _token = ref('');

	const setToken = (newToken) => {
		_token.value = newToken

		localStorage.setItem('token', newToken)
	};

	const resetToken= () => {
		_token.value = ''

		localStorage.removeItem('token')
	};

	const token = computed(() => _token.value ? _token.value : null)

	return {
		token,
		setToken,
		resetToken
	}
}
