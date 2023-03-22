<template>
	<router-view></router-view>
</template>

<script setup>
	import { computed, onBeforeMount, provide, ref } from "vue"
	import { useToken } from "@/store/token"
	import { useGardens } from "@/store/gardens"

	const tokenStore = useToken()
	const gardenStore = useGardens()
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
		while (!tokenStore.token && try_load < 10) {
			await new Promise(resolve => setTimeout(resolve, 100)); // ждем 1 секунду
			try_load++
		}
		gardenStore.syncGardens()
	}

	onBeforeMount(() => {
		hasMobile()
		loadData()
	})
</script>

<style lang="scss" scoped>

</style>
