<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{{ asset('img/logo.svg') }}">

		<title>Laravel</title>
		@vite([ 'resources/js/app.js', 'resources/scss/app.scss' ])

		<!-- Matomo -->
		<script>
			var _paq = window._paq = window._paq || [];
			/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
			_paq.push(['trackPageView']);
			_paq.push(['enableLinkTracking']);
			(function() {
			var u="//matomo.aboldyrev.ru/";
			_paq.push(['setTrackerUrl', u+'matomo.php']);
			_paq.push(['setSiteId', '1']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
			})();
		</script>
		<!-- End Matomo Code -->

	</head>
	<body>
		<div id="app"></div>
	</body>
</html>
