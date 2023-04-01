import { Popover } from 'bootstrap'

export default function() {
	const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
	const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new Popover(popoverTriggerEl))
}
