<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<link rel="icon" href="/admin/assets/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/admin/assets/css/style.css">
</head>


<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
		@if (\Session::has('success'))
			<div class="alert alert-success">
				<strong>{{ \Session::get('success') }}</strong>
			</div>
		@endif
		@if (\Session::has('delete'))
			<div class="alert alert-danger">
				<strong>{{ \Session::get('delete') }}</strong>
			</div>
		@endif
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
        @endif
			<form method="POST" action="/admin/login">
				<div class="row align-items-center text-center">
						@csrf
					<div class="col-md-12">
						<div class="card-body">
							<!-- <img src="/admin/assets/images/logo-dark.png" alt="" class="img-fluid mb-4"> -->
							<h4 class="mb-3 f-w-400">LOG IN</h4>
							<div class="form-group mb-3">
								<input name="username" type="text" class="form-control" id="username" placeholder="Username">
							</div>
							<div class="form-group mb-4">
								<input name="password" type="password" placeholder="password" class="form-control" id="Password" >
							</div>
							<button class="btn btn-block btn-primary mb-4">Signin</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script src="/admin/assets/js/vendor-all.min.js"></script>
<script src="/admin/assets/js/plugins/bootstrap.min.js"></script>
<script src="/admin/assets/js/ripple.js"></script>
<script src="/admin/assets/js/pcoded.min.js"></script>

</body>
</html>
