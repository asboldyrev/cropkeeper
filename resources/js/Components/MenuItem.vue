<template>
	<span class="nav-link disabled" aria-current="page" v-if="selected">
		<i class="ri-lg me-1" :class="icon"></i> {{ name }}
	</span>
	<a class="nav-link" aria-current="page" href="#" v-else>
		<i class="ri-lg me-1" :class="icon"></i> {{ name }}
	</a>
</template>

<script setup>
	const props = defineProps({
		name: {
			type: String,
			require: true
		},
		icon: {
			type: String,
			require: true
		},
		selected: {
			type: Boolean,
			default: false
		}
	})
</script>

<style lang="scss" scoped>

</style>
