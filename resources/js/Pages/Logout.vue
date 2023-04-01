<template>

</template>

<script setup>
	import { getActivePinia } from 'pinia'
	import { useRouter } from 'vue-router'

	const router = useRouter()

	getActivePinia()._s.forEach(store => store.$reset());

	const theme = localStorage.getItem('theme')
	localStorage.clear()
	localStorage.setItem('theme', theme)

	router.push({ name: 'login' })
</script>
