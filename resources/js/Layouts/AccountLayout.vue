<template>
	<div class="wrapper">
		<div class="sidebar border-end p-3">
			<Logo class="mb-4" />
			<Menu parent-route="account-layout" />
		</div>

		<div class="main-content m-3">
			<div class="row mb-4">
				<div class="col text-end">
					<ThemeSwitcher />

					<button class="btn btn-outline-secondary btn-sm ms-3 position-relative">
						<i class="ri-notification-2-line"></i>
						<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
							<span class="visually-hidden">New alerts</span>
						</span>
					</button>

					<Profile />
				</div>
			</div>
			<router-view></router-view>
		</div>
	</div>
</template>

<script setup>
	import Menu from "@/Blocks/Menu.vue"
	import ThemeSwitcher from '@/Blocks/ThemeSwitcher.vue'
	import Profile from "@/Blocks/Profile.vue"
	import Logo from '@/Components/Logo.vue'

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
