<template>
	<nav class="nav flex-column">
		<MenuItem
			:name="route.meta?.name"
			:icon="route.meta?.icon"
			:selected="currentRoute.name == route.name"
			:route="route.name"
			v-for="route in routes"
		/>
	</nav>
</template>

<script setup>
	import MenuItem from '@/Components/MenuItem.vue'
	import { computed } from 'vue'
	import { useRoute, useRouter } from 'vue-router'

	const props = defineProps({
		parentRoute: {
			type: String,
			required: true
		}
	})

	const currentRoute = useRoute()
	const router = useRouter()

	const routes = computed(() => {
		const parentRoute = router.getRoutes().find(route => route.name === props.parentRoute)
		if (parentRoute) {
			return parentRoute.children
		}
	})
</script>
