<template>
	<nav class="nav flex-column">
		<MenuItem
			name="Карта"
			icon="ri-road-map-line"
			:selected="route.name == 'map'"
			route="map"
		/>
		<MenuItem
			name="Календарь"
			icon="ri-calendar-line"
			:selected="route.name == 'calendar'"
			route="calendar"
		/>
		<MenuItem
			name="Растения"
			icon="ri-plant-line"
			:selected="route.name == 'plants'"
			route="plants"
		/>
		<MenuItem
			name="Участок"
			icon="ri-shape-line"
			:selected="route.name == 'plots'"
			route="plots"
		/>
		<MenuItem
			name="Семена"
			icon="ri-seedling-line"
			:selected="route.name == 'seeds'"
			route="seeds"
		/>
		<MenuItem
			name="Урожай"
			icon="ri-shopping-basket-line"
			:selected="route.name == 'harvest'"
			route="harvest"
		/>
	</nav>
</template>

<script setup>
	import MenuItem from '@/Components/MenuItem.vue'
	import { useRoute } from 'vue-router'

	const route = useRoute()
</script>

<style lang="scss" scoped>

</style>
