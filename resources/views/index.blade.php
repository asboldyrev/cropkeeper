<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{{ asset('img/logo.svg') }}">
		<title>Laravel</title>
		@vite([ 'resources/js/app.js', 'resources/scss/app.scss' ])

	</head>
	<body>
		<div id="app"></div>
	</body>
</html>
