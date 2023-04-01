import { computed, ref } from "vue"
import { useGardens } from '@/store/gardens'
import seedsApi from '@/Api/seeds'
import { defineStore } from "pinia"

export const useSeeds = defineStore('seeds', () => {
	const store = useGardens()
	const _seeds = ref([])

	function syncSeeds() {
		seedsApi
			.list(store.garden.uuid)
			.then(response => {
				_seeds.value = []
				response.data.forEach(seed => {
					_seeds.value.push(seed)
				});
			})
	}

	const seeds = computed(() => _seeds.value)

	return {
		seeds,
		syncSeeds
	}
})
