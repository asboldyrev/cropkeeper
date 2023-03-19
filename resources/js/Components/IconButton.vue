<template>
	<button type="button" class="btn btn-sm" :class="buttonType">
		<i v-if="icon" :class="icon"></i>
		<slot />
	</button>
</template>

<script setup>
	import { computed } from "vue"

	const props = defineProps({
		outline: {
			type: Boolean
		},
		type: {
			type: String,
			require: true
		},
		icon: {
			type: String
		}
	})

	const buttonType = computed(() => {
		if(props.outline) {
			return `btn-outline-${props.type}`
		}

		return `btn-${props.type}`
	})

</script>

<style lang="scss" scoped>

</style>
