import { defineStore } from 'pinia'
import { useToken } from './store/token'

export const useStore = defineStore('main', () => {
	return {
		...useToken
	}
})
