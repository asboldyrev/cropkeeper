<template>
	<div
		class="modal fade show d-block"
		tabindex="-1"
		aria-labelledby="exampleModalLiveLabel"
		aria-modal="true"
		role="dialog"
		v-if="open"
		@click.self="$emit('close')"
	>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLiveLabel">{{ title }}</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="$emit('close')"></button>
				</div>
				<div class="modal-body">
					<slot name="body"></slot>
				</div>
				<div class="modal-footer" v-if="$slots?.footer">
					<slot name="footer"></slot>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show" v-if="open"></div>
</template>

<script setup>
	const props = defineProps({
		title: {
			type: String
		},
		open: {
			type: Boolean,
			default: false
		}
	})

	defineEmits([ 'close' ])
</script>

<style lang="scss" scoped>

</style>
