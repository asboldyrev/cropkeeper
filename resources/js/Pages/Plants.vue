<template>
	<IconButton class="mb-3" type="primary" icon="ri-add-line" outline @click="createPlant">Добавить</IconButton>

	<div class="row gy-4" v-if="plants.length">
		<div class="col-3" v-for="plant in plants" :key="plant.uuid">
			<PlantCard :plant="plant" @edit="editPlant(plant)" @delete="deletePlant(plant)" />
		</div>
	</div>
	<div class="alert alert-info" role="alert" v-else>Семена отсутствуют</div>

	<Modal
		:open="showModal"
		:title="currentPlant?.uuid ? 'Редактирование растения' : 'Добавление растения'"
		@close="showModal = false"
	>
		<template #body>
			<div class="mb-3">
				<label for="name" class="form-label">Название</label>
				<input type="email" class="form-control" id="name" v-model="currentPlant.name">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Описание</label>
				<textarea class="form-control" id="description" rows="3" v-model="currentPlant.description"></textarea>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" v-model="currentPlant.is_seedling" id="is_seedling">
				<label class="form-check-label" for="is_seedling">Рассада</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" v-model="currentPlant.is_transplanted" id="is_transplanted">
				<label class="form-check-label" for="is_transplanted">Пересажен</label>
			</div>
			<div class="mb-3">
				<label for="planted_at" class="form-label">Посажен</label>
				<input type="date" class="form-control" id="planted_at" v-model="currentPlant.planted_at">
			</div>
			<div class="mb-3">
				<label for="harvested_at" class="form-label">Убран урожай</label>
				<input type="date" class="form-control" id="harvested_at" v-model="currentPlant.harvested_at">
			</div>
		</template>
		<template #footer>
			<div v-if="currentPlant.uuid">
				<IconButton type="secondary" icon="ri-close-line" outline @click="showModal = false">Отменить</IconButton>
				<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="updatePlant">Сохранить</IconButton>
			</div>
			<div v-else>
				<IconButton type="secondary" icon="ri-close-line" outline @click="showModal = false">Отменить</IconButton>
				<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="storePlant">Создать</IconButton>
			</div>
		</template>
	</Modal>
</template>

<script setup>
	import { onBeforeMount, ref } from "vue"
	import plantsApi from '@/Api/plants'
	import { useGardens } from "@/store/gardens"
	import { usePlants } from '@/store/plants'
	import PlantCard from '@/Blocks/PlantCard.vue'
	import Modal from '@/Blocks/Modal.vue'
	import IconButton from "@/Components/IconButton.vue"

	const gardenStore = useGardens()
	const plantStore = usePlants()

	const plants = ref([])
	const currentPlant = ref({
		uuid: null,
		name: '',
		description: null,
		is_seedling: false,
		is_transplanted: false,
		planted_at: null,
		harvested_at: null
	})
	const showModal = ref(false)

	function createPlant() {
		currentPlant.value = {
			uuid: null,
			name: '',
			description: null,
			is_seedling: false,
			is_transplanted: false,
			planted_at: null,
			harvested_at: null
		}

		showModal.value = true
	}

	function storePlant() {
		const data = {
			...currentPlant.value,
			garden_uuid: gardenStore.garden.uuid
		}

		plantsApi
			.store(data)
			.then(response => {
				// showModal.value = false
				// plantStore.syncPlants()
			})
	}

	function editPlant(plant) {
		currentPlant.value = {
			uuid: plant.uuid,
			name: plant.name,
			description: plant.description,
			is_seedling: plant.is_seedling,
			is_transplanted: plant.is_transplanted,
			planted_at: plant.planted_at,
			harvested_at: plant.harvested_at,
		}
		showModal.value = true
	}

	function updatePlant() {
		const data = {
			...currentSeed.value,
			garden_uuid: gardenStore.garden.uuid
		}

		seedsApi
			.update(currentSeed.value.uuid, data)
			.then(response => {
				showModal.value = false
				plantStore.syncPlants()
			})
	}

	function deletePlant(plant) {
		seedsApi
			.delete(seed.uuid)
			.then(response => {
				plantStore.syncPlants()
			})
	}


	onBeforeMount(() => {
		plantsApi
			.list(gardenStore.garden?.uuid)
			.then(response => {
				response.data.forEach(plant => {
					plants.value.push(plant)
				});
			})
	})
</script>

<style lang="scss" scoped>

</style>
