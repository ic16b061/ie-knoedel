<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.partials.headknoedel')
</head>
<body>
	@include('layout.partials.navknoedel')
	@include('layout.partials.headerknoedel')
	@yield('content')
	@include('layout.partials.footerknoedel')
	@include('layout.partials.footer-scripts')
</body>
</html>
