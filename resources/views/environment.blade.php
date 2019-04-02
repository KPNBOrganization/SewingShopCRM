<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="/vendors/bootstrap-4.3.1/css/bootstrap.min.css" />
	
	<script src="/vendors/jquery-3.3.1.min.js"></script>
	<script src="/vendors/bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>

    <title>SewingShop CRM</title>

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<a class="navbar-brand" href="/">SewingShop CRM</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav mr-auto">

				<li class="nav-item">
					<a class="nav-link" href="#">Orders</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="/clients">Clients</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#">Payments</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#">Reports</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="">POS</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="/products-services">Products & Services</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="/managers">Managers</a>
				</li>

			</ul>

			<a href="/logout" class="btn text-white-50 float-lg-right px-0">
				Log out
			</a>

		</div>

	</nav>
	
	<div class="container">

		<div class="row">

			<div class="col-12 py-4">

    			@yield( 'content' )

			</div>

		</div>

	</div>

</body>

</html>