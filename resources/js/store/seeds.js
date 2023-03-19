import { computed, ref } from "vue"
import { useStore } from '../store'
import seedsApi from '../Api/seeds'

export function useSeeds() {
	const store = useStore()
	const _seeds = ref([])

	function syncSeeds() {
		setTimeout(() => {
			seedsApi
				.list(store.garden.uuid)
				.then(response => {
					_seeds.value = []
					response.data.forEach(seed => {
						_seeds.value.push(seed)
					});
				})
		}, 400)
	}

	const seeds = computed(() => _seeds.value)

	return {
		seeds,
		syncSeeds
	}
}
