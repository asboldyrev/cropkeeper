<template>
	<div class="btn-group" role="group" aria-label="Basic example">
		<input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" :checked="selectedTheme == 'light'" @click="toggleTheme('light')">
		<label class="btn btn-outline-primary btn-sm" for="option1">
			<i class="ri-sun-line"></i>
		</label>

		<input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" :checked="selectedTheme == 'dark'" @click="toggleTheme('dark')">
		<label class="btn btn-outline-primary btn-sm" for="option2">
			<i class="ri-moon-line"></i>
		</label>
	</div>
</template>

<script setup>
import { onBeforeMount, ref } from "vue";

	const selectedTheme = ref(null);

	function toggleTheme(themeName) {
		document.querySelector('[data-bs-theme]').dataset.bsTheme = themeName
		localStorage.setItem('theme', themeName)
		selectedTheme.value = themeName
	}


	onBeforeMount(() => {
		const themeName = localStorage.getItem('theme')
		if(themeName) {
			toggleTheme(themeName)
		}
	})
</script>

<style lang="scss" scoped>

</style>
