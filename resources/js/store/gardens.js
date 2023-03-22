import { defineStore } from "pinia";
import { computed, ref } from "vue";
import gardenApi from "../Api/garden";

export const useGardens = defineStore('gardens', () => {
	const _gardens = ref([])

	function syncGardens() {
		gardenApi
			.list()
			.then(response => {
				_gardens.value = []
				response.data.forEach(garden => {
					_gardens.value.push(garden)
				});
			})
	}

	const gardens = computed(() => _gardens.value)
	const garden = computed(() => _gardens.value[0])

	return {
		gardens,
		garden,
		syncGardens
	}
})
