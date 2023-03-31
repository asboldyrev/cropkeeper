<template>
	<nav class="nav flex-column">
		<MenuItem
			name="Сводка"
			icon="ri-dashboard-line"
			:selected="route.name == 'dashboard'"
			route="dashboard"
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
		<MenuItem
			name="Участок"
			icon="ri-shape-line"
			:selected="route.name == 'plots'"
			route="plots"
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
