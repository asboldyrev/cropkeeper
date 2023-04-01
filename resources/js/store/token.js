import { defineStore } from 'pinia';
import { computed, ref } from 'vue'

export const useToken = defineStore('token', () => {
	const _token = ref('');

	const setToken = (newToken) => {
		_token.value = newToken

		localStorage.setItem('token', newToken)
	};

	const resetToken= () => {
		_token.value = ''

		localStorage.removeItem('token')
	};

	function $reset() {
		_token.value = ''
	}

	const token = computed(() => _token.value ? _token.value : null)

	return {
		token,
		setToken,
		resetToken,
		$reset
	}
})
