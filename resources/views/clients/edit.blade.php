<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="/vendors/bootstrap-4.3.1/css/bootstrap.min.css" />
	
	<script src="/vendors/jquery-3.3.1.min.js"></script>
	<script src="/vendors/bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>

	<h1>{{ $client->Name }}</h1>

	<p>{{ $client->Phone }}</p>
	<p>{{ $client->Address }}</p>
</body>
</html>