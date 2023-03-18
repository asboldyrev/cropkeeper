import { useStore } from "@/store";

export default {
	async request(uri, body = {}, token) {
		const store = useStore();

		if(!token) {
			token = store.token;
		}

		let headers = {
			'Accept': 'application/json',
			'Content-Type': 'application/json;charset=utf-8',
			'X-XSRF-TOKEN': getCookie('XSRF-TOKEN')
		};

		const data = {
			method: 'post',
			headers: headers,
			body: ''
		};

		data.body = JSON.stringify(body);

		if(token) {
			data.headers['Authorization'] = `Bearer ${ token }`;
		}

		return await fetch(`api/${uri}`, data)
			.then(response => response.json())
			.then(response => {
				// if (useCheckErrorInResponse(response)) {
				// 	return Promise.reject(new Error(response?.error?.message || response.status.message));
				// }

				return response;
			});
	}
}

function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}
