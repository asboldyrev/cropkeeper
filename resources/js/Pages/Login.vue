<template>
	<div class="card login-form mx-auto">
		<div class="card-body">
			<div class="mb-3">
				<label for="login" class="form-label">Логин</label>
				<input type="text" class="form-control" id="login" v-model="login" @keypress.enter="auth" autofocus>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Пароль</label>
				<input type="password" class="form-control" id="password" v-model="password" @keypress.enter="auth">
			</div>
			<div class="d-grid gap-2">
				<button class="btn btn-primary" type="button" @click="auth">Войти</button>
			</div>
		</div>
	</div>
</template>

<script setup>
	import { ref } from "vue";
	import authApi from '@/Api/auth'
	import { useToken } from '@/store/token'
	import { useRouter } from 'vue-router'

	const store = useToken()
	const router = useRouter()

	const login = ref('')
	const password = ref('')

	function auth() {
		authApi
			.getToken({
				login: login.value,
				password: password.value
			})
			.then(response => {
				store.setToken(response.token)
				router.push({ name: 'dashboard' })
			})
	}

</script>

<style lang="scss" scoped>
	.login-form {
		max-width: 500px;
	}
</style>
