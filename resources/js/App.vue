<template>
	<router-view></router-view>
</template>

<script setup>
	import { computed, onBeforeMount, provide, ref } from "vue";

	const isMobile = ref(false)

	provide('isMobile', isMobile)

	function hasMobile() {
		isMobile.value = screen.width <= 500
	}

	let doit;
	window.addEventListener('resize', () => {
		clearTimeout(doit)
		doit = setTimeout(hasMobile, 100)
	})

	onBeforeMount(hasMobile)
</script>

<style lang="scss" scoped>

</style>
