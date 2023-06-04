<template>
	<IconButton class="mb-3" type="primary" icon="ri-add-line" outline @click="createPlot">Добавить</IconButton>

	<div class="row" v-if="plotStore.plots.length">
		<div class="col-sm-9">
			<div>
				<img src="https://placehold.co/1900x800?text=Map+Preview" class="img-fluid">
			</div>
		</div>
		<div class="col-sm-3">
			<div class="list-group">
				<PlotCard
					v-for="plot in plotStore.plots"
					:key="plot.uuid"
					:plot="plot"
					@edit="editPlot"
					@delete="deletePlot"
				/>
			</div>
		</div>
	</div>
	<div class="alert alert-info" role="alert" v-else>Участки отсутствуют</div>

	<Modal :open="showModal" :title="currentPlot?.uuid ? 'Редактирование участка' : 'Добавление участка'" @close="showModal = false">
		<template #body>
			<div class="mb-3">
				<label for="name" class="form-label">Название</label>
				<input type="text" class="form-control" id="name" v-model="currentPlot.name">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Описание</label>
				<textarea class="form-control" id="description" rows="3" v-model="currentPlot.description"></textarea>
			</div>
			<div class="mb-3">
				<label for="count" class="form-label">Способ посадки</label>
				<select class="form-select" id="count" v-model="currentPlot.planting_method_uuid">
					<option :value="method.uuid" v-for="method in plantingMethodStore.methods">{{ method.name }}</option>
				</select>
			</div>
		</template>
		<template #footer>
			<IconButton type="secondary" icon="ri-close-line" outline @click="showModal = false">Отменить</IconButton>
			<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="updatePlot" v-if="currentPlot.uuid">Сохранить</IconButton>
			<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="storePlot" v-else>Создать</IconButton>
		</template>
	</Modal>
</template>

<script setup>
	import { onBeforeMount, ref } from "vue"
	import { usePlots } from "@/store/plots"
	import { useGardens } from "@/store/gardens"
	import { usePlantingMethods } from "@/store/planting_methods"
	import PlotCard from '@/Blocks/PlotCard.vue'
	import IconButton from '@/Components/IconButton.vue'
	import Modal from "@/Blocks/Modal.vue"
	import plotsApi from '@/Api/plots'

	const plotStore = usePlots()
	const gardenStore = useGardens()
	const plantingMethodStore = usePlantingMethods()
	const showModal = ref(false)

	plantingMethodStore.syncMethods()

	const currentPlot = ref({
		uuid: null,
		name: '',
		description: '',
		planting_method_uuid: plantingMethodStore.methods[0]
	})

	function createPlot() {
		currentPlot.value = {
			uuid: null,
			name: '',
			description: '',
			planting_method_uuid: plantingMethodStore.methods[0].uuid
		}

		showModal.value = true
	}

	function storePlot() {
		const data = {
			...currentPlot.value,
			garden_uuid: gardenStore.garden.uuid
		}

		plotsApi
			.store(data)
			.then(response => {
				showModal.value = false
				plotStore.syncPlots()
			})
	}

	function editPlot(plot) {
		currentPlot.value = plot

		showModal.value = true
	}

	function updatePlot() {
		const data = {
			...currentPlot.value,
			garden_uuid: gardenStore.garden.uuid
		}

		plotsApi
			.update(currentPlot.value.uuid, data)
			.then(response => {
				showModal.value = false
				plotStore.syncPlots()
			})
	}

	function deletePlot(plot) {
		plotsApi
			.delete(plot.uuid)
			.then(response => {
				plotStore.syncPlots()
			})
	}

	onBeforeMount(() => {
		plotStore.syncPlots()
	})
</script>

<style lang="scss" scoped>

</style>
