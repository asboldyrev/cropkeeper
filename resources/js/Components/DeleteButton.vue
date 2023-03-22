<template>
	<IconButton
		type="danger"
		:icon="icon"
		:outline="outline"
		@click="deleteConfirm"
	>
		<slot></slot>
	</IconButton>
</template>

<script setup>
	import IconButton from '@/Components/IconButton.vue'

	const props = defineProps({
		confirmText: {
			type: String,
			default: 'Вы действительно хотите удалить данный элемент?'
		},
		outline: {
			type: Boolean
		},
		icon: {
			type: String
		}
	})

	const emit = defineEmits([ 'confirm' ])

	function deleteConfirm(event) {
		if(!confirm(props.confirmText)) {
			event.preventDefault();
		} else {
			emit('confirm', event)
		}
	}
</script>

<style lang="scss" scoped>
</style>
