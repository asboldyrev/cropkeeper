<template>
	<IconButton class="mb-3" type="primary" icon="ri-add-line" outline @click="createSeed">Добавить</IconButton>

	<div class="row gy-4" v-if="seedStore.seeds.length">
		<div class="col-sm col-md-4 col-lg-3" v-for="seed in seedStore.seeds" :key="seed.uuid">
			<SeedCard :seed="seed" @edit="editSeed" @delete="deleteSeed" />
		</div>
	</div>
	<div class="alert alert-info" role="alert" v-else>Семена отсутствуют</div>

	<Modal :open="showModal" :title="currentSeed?.uuid ? 'Редактирование семян' : 'Добавление семян'" @close="showModal = false">
		<template #body>
			<div class="mb-3">
				<label for="name" class="form-label">Название</label>
				<input type="text" class="form-control" id="name" v-model="currentSeed.name">
			</div>
			<div class="mb-3">
				<label for="manufacturer" class="form-label">Производитель</label>
				<input type="text" class="form-control" id="manufacturer" v-model="currentSeed.manufacturer">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Описание</label>
				<textarea class="form-control" id="description" rows="3" v-model="currentSeed.description"></textarea>
			</div>
			<div class="mb-3">
				<label for="bought_at" class="form-label">Куплен</label>
				<input type="date" class="form-control" id="bought_at" v-model="currentSeed.bought_at">
			</div>
			<div class="mb-3">
				<label for="expiration_at" class="form-label">Годен до</label>
				<input type="date" class="form-control" id="expiration_at" v-model="currentSeed.expiration_at">
			</div>
			<div class="mb-3">
				<label for="count" class="form-label">Количество</label>
				<input type="number" min="0" :step="stepCount" class="form-control" id="count" v-model="currentSeed.count">
			</div>
			<div class="mb-3">
				<label for="count" class="form-label">Единицы измерения</label>
				<select class="form-select" id="count" v-model="currentSeed.unit">
					<option value="grams">гр.</option>
					<option value="quantity">шт.</option>
				</select>
			</div>
		</template>
		<template #footer>
			<div v-if="currentSeed.uuid">
				<IconButton type="secondary" icon="ri-close-line" outline @click="showModal = false">Отменить</IconButton>
				<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="updateSeed">Сохранить</IconButton>
			</div>
			<div v-else>
				<IconButton type="secondary" icon="ri-close-line" outline @click="showModal = false">Отменить</IconButton>
				<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="storeSeed">Создать</IconButton>
			</div>
		</template>
	</Modal>
</template>

<script setup>
	import { computed, onBeforeMount, ref } from "vue"
	import { useSeeds } from "@/store/seeds"
	import { useGardens } from "@/store/gardens"
	import SeedCard from '@/Blocks/SeedCard.vue'
	import IconButton from '@/Components/IconButton.vue'
	import Modal from "@/Blocks/Modal.vue"
	import seedsApi from '@/Api/seeds'

	const seedStore = useSeeds()
	const gardenStore = useGardens()
	const showModal = ref(false)

	const currentSeed = ref({
		uuid: null,
		name: '',
		manufacturer: '',
		description: '',
		bought_at: null,
		expiration_at: null,
		count: 0,
		unit: 'grams'
	})

	const stepCount = computed(() => {
		if(currentSeed.value.unit == 'quantity') {
			return 1
		}

		return 0.01
	})

	function storeSeed() {
		const data = {
			...currentSeed.value,
			garden_uuid: gardenStore.garden.uuid
		}

		seedsApi
			.store(data)
			.then(response => {
				showModal.value = false
				seedStore.syncSeeds()
			})
	}

	function createSeed() {
		currentSeed.value = {
			uuid: null,
			name: '',
			manufacturer: '',
			description: '',
			bought_at: null,
			expiration_at: null,
			count: 0,
			unit: 'grams',
		}

		showModal.value = true
	}

	function editSeed(seed) {
		currentSeed.value = seed

		showModal.value = true
	}

	function updateSeed() {
		const data = {
			...currentSeed.value,
			garden_uuid: gardenStore.garden.uuid
		}

		seedsApi
			.update(currentSeed.value.uuid, data)
			.then(response => {
				showModal.value = false
				seedStore.syncSeeds()
			})
	}

	function deleteSeed(seed) {
		seedsApi
			.delete(seed.uuid)
			.then(response => {
				seedStore.syncSeeds()
			})
	}

	onBeforeMount(() => {
		seedStore.syncSeeds()
	})

</script>

<style lang="scss" scoped>

</style>
