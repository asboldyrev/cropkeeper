<template>
	<div class="card">
		<img src="https://placehold.co/600x400" alt="">
		<div class="card-body">
			<h6>{{ seed.name }}<span class="text-muted fw-normal" v-if="seed.manufacturer"> ({{ seed.manufacturer }})</span></h6>
			<p :class="{'mb-0': !seed.expiration_at}"><strong>Количество</strong>: {{ seed.count }}</p>
			<p v-if="seed.expiration_at"><strong>Годен до</strong>: {{ dayjs(props.seed.expiration_at).format('LL') }}</p>
		</div>
		<div class="card-footer">
			<IconButton type="primary" icon="ri-pencil-line" @click="$emit('edit', seed)">Редактировать</IconButton>
			<DeleteButton class="ms-3" type="danger" icon="ri-delete-bin-line" outline @confirm="$emit('delete', seed)">Удалить</DeleteButton>
		</div>
	</div>
</template>

<script setup>
	import IconButton from '../Components/IconButton.vue'
	import DeleteButton from '../Components/DeleteButton.vue'
	import { inject } from 'vue'

	const dayjs = inject('dayJs')

	const props = defineProps({
		seed: {
			type: Object,
			require: true
		}
	})

	defineEmits([ 'edit', 'delete' ])
</script>

<style lang="scss" scoped>

</style>
