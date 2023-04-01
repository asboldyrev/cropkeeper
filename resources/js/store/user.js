import { defineStore } from "pinia";
import { computed, ref } from "vue";
import gardenApi from "@/Api/garden";

export const useUser = defineStore('user', () => {
	const _user = ref(JSON.parse(localStorage.getItem('user')) || [])

	function syncUser() {
		gardenApi
			.list()
			.then(response => {
				_user.value = []
				response.data.forEach(garden => {
					_user.value.push(garden)
				});
				localStorage.setItem('gardens', JSON.stringify(_user.value))
			})
	}

	function $reset() {
		_user.value = {}
	}

	const gardens = computed(() => _user.value)
	const garden = computed(() => _user.value[0])

	return {
		gardens,
		garden,
		syncGardens,
		$reset
	}
})
