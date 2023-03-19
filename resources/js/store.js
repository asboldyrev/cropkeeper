import { defineStore } from 'pinia'
import { useGardens } from './store/gardens'
import { useSeeds } from './store/seeds'
import { useToken } from './store/token'

export const useStore = defineStore('main', () => {
	return {
		...useToken(),
		...useSeeds(),
		...useGardens()
	}
})
