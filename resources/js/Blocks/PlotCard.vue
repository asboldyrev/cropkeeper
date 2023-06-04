<template>
	<span class="list-group-item list-group-item-action" aria-current="true">
		<div class="row">
			<div class="col">{{ plot.name }}</div>
			<div class="col-auto">
				<div class="btn-group" role="group" aria-label="Basic example">
					<IconButton type="primary" outline icon="ri-pencil-line" @click="$emit('edit', plot)"></IconButton>
					<DeleteButton class="" type="danger" icon="ri-delete-bin-line" outline @confirm="$emit('delete', plot)"></DeleteButton>
				</div>
			</div>
		</div>
	</span>
</template>

<script setup>
	import IconButton from '@/Components/IconButton.vue'
	import DeleteButton from '@/Components/DeleteButton.vue'

	const props = defineProps({
		plot: {
			type: Object,
			require: true
		}
	})

	defineEmits([ 'edit', 'delete' ])
</script>

<style lang="scss" scoped>

</style>
