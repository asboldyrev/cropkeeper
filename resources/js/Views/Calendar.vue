<template>
	<MobileAppTemplate v-if="isMobile">
		calendar
	</MobileAppTemplate>
	<DesktopAppTemplate v-else>
		calendar
	</DesktopAppTemplate>
</template>

<script setup>
	import { inject } from "vue";
	import DesktopAppTemplate from "@/Layouts/DesktopAppTemplate.vue";
	import MobileAppTemplate from "@/Layouts/MobileAppTemplate.vue";

	const isMobile = inject('isMobile')

</script>

<style lang="scss" scoped>

</style>
