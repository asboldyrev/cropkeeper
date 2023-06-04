import { computed, ref } from "vue"
import { useGardens } from '@/store/gardens'
import { defineStore } from "pinia"
import plantingMethodsApi from "@/Api/planting_methods"

export const usePlantingMethods = defineStore('planting_methods', () => {
	const store = useGardens()
	const _methods = ref([])

	function syncMethods() {
		plantingMethodsApi
			.list()
			.then(response => {
				_methods.value = []
				response.data.forEach(seed => {
					_methods.value.push(seed)
				});
			})
	}

	const methods = computed(() => _methods.value)

	return {
		methods,
		syncMethods
	}
})
