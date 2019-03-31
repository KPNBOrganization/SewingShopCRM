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

    <div class="container">

        <div class="row">

            <div class="col-md-3">
            </div>

            <div class="col-md-6 shadow p-4">

                <h2 class="mb-4">Login</h2>

                <form action="" method="post">

                    @csrf

                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" name="username" />
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                </form>

                @if( isset( $error ) )

                    <div class="alert alert-danger mt-4" role="alert">
                        {{ $error }}
                    </div>

                @endif

            </div>

            <div class="col-md-3">
            </div>

        </div>

    </div>
	
</body>
</html>