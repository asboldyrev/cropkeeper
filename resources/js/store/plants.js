import { computed, ref } from "vue"
import { useGardens } from '@/store/gardens'
import plantApi from '@/Api/plants'
import { defineStore } from "pinia"

export const usePlants = defineStore('plants', () => {
	const store = useGardens()
	const _plants = ref([])

	function syncPlants() {
		plantApi
			.list(store.garden.uuid)
			.then(response => {
				_plants.value = []
				response.data.forEach(seed => {
					_plants.value.push(seed)
				});
			})
	}

	function $reset() {
		_plants.value = []
	}

	const plants = computed(() => _plants.value)

	return {
		plants,
		syncPlants,
		$reset
	}
})
