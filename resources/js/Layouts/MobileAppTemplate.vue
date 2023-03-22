<template>
	<div class="wrapper">
		<div class="main-content m-3">
			<div class="text-end mb-3">
				<ThemeSwitcher />
				<button
					type="button"
					class="btn btn-sm ms-3"
					:class="{ 'btn-outline-secondary': menuCollapsed,  'btn-secondary': !menuCollapsed }"
					@click="menuToggle"
				>
					<i class="ri-menu-line"></i>
				</button>
			</div>
			<slot />
		</div>
	</div>
</template>

<script setup>
	import Menu from "@/Blocks/Menu.vue";
	import ThemeSwitcher from '@/Blocks/ThemeSwitcher.vue'
</script>

<style lang="scss" scoped>
	.wrapper {
		display: grid;
		grid-template-columns: 200px auto; /* Ширина сайдбара */
		grid-template-rows: 100vh; /* Высота страницы */
	}

	.sidebar {
		grid-column: 1 / 2; /* Разместить сайдбар в первом столбце */
	}

	.main-content {
		grid-column: 2 / 3; /* Разместить основной контент во втором столбце */
	}
</style>
