<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>CityShop</title>

		<!-- Google font -->
		@include('frontend.styles')

    </head>
	<body>
		<!-- HEADER -->
	@include('frontend.header')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
	@include('frontend.navbar')
		<!-- /NAVIGATION -->
		<!-- SECTION -->
	@yield('content')
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		@include('frontend.newsletter')
		<!-- /NEWSLETTER -->

		@include('frontend.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
@include('frontend.scripts')
	</body>
</html>
