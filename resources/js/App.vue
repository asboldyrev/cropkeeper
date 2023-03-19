<template>
	<router-view></router-view>
</template>

<script setup>
	import { computed, onBeforeMount, provide, ref } from "vue"
	import { useStore } from "./store"

	const store = useStore()
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

	async function loadData() {
		let try_load = 0
		// ждем, пока переменная myVariable не будет готова
		while (!store.token && try_load < 10) {
			await new Promise(resolve => setTimeout(resolve, 100)); // ждем 1 секунду
			try_load++
		}
		store.syncGardens()
	}

	onBeforeMount(() => {
		hasMobile()
		loadData()
	})
</script>

<style lang="scss" scoped>

</style>
