<template>
	<router-view></router-view>
</template>

<script setup>
	import { inject, onBeforeMount, onMounted, provide, ref } from "vue"

	const isMobile = ref(false)

	provide('isMobile', isMobile)

	const bootstrap = inject('bootstrap')

	function hasMobile() {
		isMobile.value = screen.width <= 500
	}

	let doit;
	window.addEventListener('resize', () => {
		clearTimeout(doit)
		doit = setTimeout(hasMobile, 100)
	})

	onBeforeMount(() => {
		hasMobile()
	})

	onMounted(() => {
		setTimeout(bootstrap, 1000)
	})
</script>

<style lang="scss" scoped>

</style>
