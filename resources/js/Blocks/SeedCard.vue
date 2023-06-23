<template>
	<div class="card overflow-hidden">
		<img :src="seed.images[0]?.urls?.preview || 'https://placehold.co/600x400'" alt="">
		<div class="card-body">
			<h6 class="mb-3">{{ seed.name }}<span class="text-muted fw-normal" v-if="seed.manufacturer"> ({{ seed.manufacturer }})</span></h6>
			<p class="mb-0" v-if="seed.expiration_at"><strong>Годен до</strong>: {{ dayjs(props.seed.expiration_at).format('LL') }}</p>
		</div>
		<div class="card-footer">
			<IconButton type="primary" is-small icon="ri-pencil-line" @click="$emit('edit', seed)">Править</IconButton>
			<DeleteButton class="ms-3" type="danger" icon="ri-delete-bin-line" outline @confirm="$emit('delete', seed)">Удалить</DeleteButton>
		</div>
	</div>
</template>

<script setup>
	import IconButton from '@/Components/IconButton.vue'
	import DeleteButton from '@/Components/DeleteButton.vue'
	import { inject } from 'vue'

	const dayjs = inject('dayjs')

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
