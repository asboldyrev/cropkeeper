<template>
	<div class="wrapper">
		<div class="sidebar border-end p-3">
			<a class="navbar-brand d-inline-block mb-4" href="#">
				<img src="img/logo.svg" alt="Logo" height="28" class="ms-3">
				<span class="ms-2">CropKeeper</span>
			</a>
			<Menu />
		</div>

		<div class="main-content m-3">
			<div class="text-end mb-3">
				<ThemeSwitcher />

				<button class="btn btn-outline-secondary btn-sm ms-3 position-relative">
					<i class="ri-notification-2-line"></i>
					<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
						<span class="visually-hidden">New alerts</span>
					</span>
				</button>

				<img src="https://avatars.githubusercontent.com/u/15995789?s=96&v=4" alt="" width="32" height="32" class="rounded-circle ms-3">
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
