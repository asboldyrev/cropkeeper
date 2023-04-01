<template>
	<div class="d-inline-block navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<img
					src="https://avatars.githubusercontent.com/u/15995789?s=96&v=4"
					alt=""
					width="32"
					height="32"
					class="rounded-circle ms-3"
					@click="showMenu = true"
				>
			</a>
			<ul class="dropdown-menu">
				<li>
					<router-link class="dropdown-item" :to="{ name: 'profile' }">
						<i class="ri-user-line"></i> Профиль
					</router-link>
				</li>
				<!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
				<li>
					<hr class="dropdown-divider">
				</li>
				<li>
					<router-link class="dropdown-item" :to="{ name: 'logout' }">
						<i class="ri-logout-box-r-line"></i> Выход
					</router-link>
				</li>
			</ul>
		</li>
	</div>
</template>

<script setup>
	import { ref } from 'vue'
	import MenuItem from '@/Components/MenuItem.vue'

	const showMenu = ref(false)
</script>

<style lang="scss" scoped>
	.dropdown-toggle::after {
		display: none;
	}
</style>
