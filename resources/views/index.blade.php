<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>
		@vite([ 'resources/js/app.js', 'resources/scss/app.scss' ])
	</head>
	<body>
		<div id="app" data-bs-theme="light"></div>
	</body>
</html>
