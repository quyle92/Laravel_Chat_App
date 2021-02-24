<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
	<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div id="app"></div>
</body>

<script src="{{ asset('js/app.js') }}"></script>


</html>