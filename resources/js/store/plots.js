import { computed, ref } from "vue"
import { useGardens } from '@/store/gardens'
import plotsApi from '@/Api/plots'
import { defineStore } from "pinia"

export const usePlots = defineStore('plots', () => {
	const store = useGardens()
	const _plots = ref([])

	function syncPlots() {
		plotsApi
			.list(store.garden.uuid)
			.then(response => {
				_plots.value = []
				response.data.forEach(seed => {
					_plots.value.push(seed)
				});
			})
	}

	function $reset() {
		_plots.value = []
	}

	const plots = computed(() => _plots.value)

	return {
		plots,
		syncPlots,
		$reset
	}
})
