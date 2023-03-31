<template>
	<div class="card position-relative overflow-hidden">

		<div class="position-absolute mt-2 ms-2">
			<span class="badge bg-success rounded-pill" v-if="plant.is_seedling">Рассада</span>
			<span class="badge bg-info rounded-pill ms-2" v-if="plant.is_transplanted">Пересажен</span>
			<span class="badge bg-warning text-bg-warning rounded-pill ms-2" v-if="plant.harvested_at != null">Убран</span>
		</div>

		<img src="https://placehold.co/600x400" alt="">
		<div class="card-body">
			<h6 class="mb-3">{{ plant.name }}</h6>
			<p>{{ plant.description }}</p>
		</div>
		<div class="card-footer">
			<IconButton type="primary" icon="ri-pencil-line" @click="$emit('edit', plant)">Редактировать</IconButton>
			<DeleteButton class="ms-3" type="danger" icon="ri-delete-bin-line" outline @confirm="$emit('delete', plant)">Удалить</DeleteButton>
		</div>
	</div>
</template>

<script setup>
	import IconButton from '@/Components/IconButton.vue'
	import DeleteButton from '@/Components/DeleteButton.vue'
	import { inject } from 'vue'

	const dayjs = inject('dayjs')

	const props = defineProps({
		plant: {
			type: Object,
			require: true
		}
	})

	defineEmits([ 'edit', 'delete' ])
</script>

<style lang="scss" scoped>

</style>
