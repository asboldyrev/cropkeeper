<template>
	<IconButton class="mb-3" type="primary" icon="ri-add-line" outline @click="createSeed">Добавить</IconButton>

	<div class="row gy-4" v-if="seedStore.seeds.length">
		<div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12" v-for="seed in seedStore.seeds" :key="seed.uuid">
			<SeedCard :seed="seed" @edit="editSeed" @delete="deleteSeed" />
		</div>
	</div>
	<div class="alert alert-info" role="alert" v-else>Семена отсутствуют</div>

	<Modal :open="showModal" :title="currentSeed?.uuid ? 'Редактирование семян' : 'Добавление семян'" @close="closeModal">
		<template #body>
			<div class="mb-3">
				<label for="name" class="form-label">Название</label>
				<input type="text" class="form-control" :class="{ 'is-invalid': errors?.name?.length }" id="name" v-model="currentSeed.name">
				<div class="invalid-feedback" v-for="(errorMessage, index) in errors?.name" :key="index">{{ errorMessage }}</div>
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
				<label for="formFile" class="form-label">Фото</label>
				<input class="form-control" type="file" id="formFile" accept="image/*">
			</div>

			<div class="mb-3" v-if="currentSeed?.images && currentSeed.images[0]?.urls?.thumb">
				<img class="img-fluid" :src="currentSeed.images[0]?.urls?.thumb" alt="">
				<div class="form-check">
					<input
						class="form-check-input"
						v-model="currentSeed.deleteMedia"
						:id="`seed${currentSeed.images[0]?.media?.id}`"
						type="checkbox"
					>
					<label class="form-check-label" :for="`seed${currentSeed.images[0]?.media?.id}`">Удалить</label>
				</div>
			</div>

			<div class="mb-3">
				<label for="bought_at" class="form-label">Куплен</label>
				<input type="date" class="form-control" id="bought_at" v-model="currentSeed.bought_at">
			</div>
			<div class="mb-3">
				<label for="expiration_at" class="form-label">Годен до</label>
				<input type="date" class="form-control" id="expiration_at" v-model="currentSeed.expiration_at">
			</div>
		</template>
		<template #footer>
			<div v-if="currentSeed.uuid">
				<IconButton type="secondary" icon="ri-close-line" outline @click="closeModal">Отменить</IconButton>
				<IconButton class="ms-3" type="primary" icon="ri-check-line" @click="updateSeed">Сохранить</IconButton>
			</div>
			<div v-else>
				<IconButton type="secondary" icon="ri-close-line" outline @click="closeModal">Отменить</IconButton>
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
	import requestApi from '@/Api/request'

	const seedStore = useSeeds()
	const gardenStore = useGardens()
	const showModal = ref(false)

	const errors = ref({})

	const currentSeed = ref({
		uuid: null,
		name: '',
		manufacturer: '',
		description: '',
		bought_at: null,
		expiration_at: null,
		count: 0,
		unit: 'grams',
		images: [],
		deleteMedia: false
	})

	const stepCount = computed(() => {
		if(currentSeed.value.unit == 'quantity') {
			return 1
		}

		return 0.01
	})

	function closeModal() {
		showModal.value = false
		errors.value = {}
		document.querySelector('input[type="file"]').value = null
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

	async function storeSeed() {
		const file = document.querySelector('input[type="file"]').files[0]
		let filenames;

		if(file) {
			filenames = await requestApi.uploadFile(file)
		}

		const data = {
			...currentSeed.value,
			garden_uuid: gardenStore.garden.uuid,
			filenames
		}

		seedsApi
			.store(data)
			.then(response => {
				if(response?.errors) {
					errors.value = response?.errors
				} else {
					closeModal()
					seedStore.syncSeeds()
				}
			})
	}

	function editSeed(seed) {
		currentSeed.value = { ...seed }

		showModal.value = true
	}

	async function updateSeed() {
		const file = document.querySelector('input[type="file"]').files[0]
		let filenames;

		if(file) {
			filenames = await requestApi.uploadFile(file)
		}

		const data = {
			...currentSeed.value,
			garden_uuid: gardenStore.garden.uuid,
			filenames
		}

		seedsApi
			.update(currentSeed.value.uuid, data)
			.then(response => {
				if(response?.errors) {
					errors.value = response?.errors
				} else {
					closeModal()
					seedStore.syncSeeds()
				}
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
