<?php

// include library
require_once('../lib/bootstrap.php');

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link href="css/main.css" rel="stylesheet">
		<title>Jarvis</title>
 	</head>
	<?php if (empty($_user)) { ?>
		<body id="login">
			<main class="form-signin">
				<form method="post" action="/index.php">
					<input type="hidden" name="mode" value="login" />
					<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
					<div class="form-floating">
						<input type="email" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Email address</label>
					</div>
					<div class="form-floating">
						<input type="password" name="password" minlength="9" class="form-control" id="floatingPassword" placeholder="Password">
						<label for="floatingPassword">Password</label>
					</div>
					<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
				</form>
			</main>
	<?php } else { ?>
		<body id="dashboard">
			<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
				<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Jarvis</a>
				<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<ul class="navbar-nav px-3">
					<li class="nav-item text-nowrap">
						<a class="nav-link" href="?mode=logout">Sign out</a>
					</li>
				</ul>
			</header>
			<div class="container-fluid">
				<div class="row">
					<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
						<div class="position-sticky pt-3">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="#">
										<span data-feather="home"></span>
										Dashboard
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span data-feather="file"></span>
										Orders
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span data-feather="shopping-cart"></span>
										Products
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span data-feather="users"></span>
										Customers
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span data-feather="bar-chart-2"></span>
										Reports
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span data-feather="layers"></span>
										Integrations
									</a>
								</li>
							</ul>
						</div>
					</nav>
					<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
						<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
							<h1 class="h2">Dashboard</h1>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-sm">
								<thead>
									<tr>
										<th>#</th>
										<th>Header</th>
										<th>Header</th>
										<th>Header</th>
										<th>Header</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1,001</td>
										<td>random</td>
										<td>data</td>
										<td>placeholder</td>
										<td>text</td>
									</tr>
									<tr>
										<td>1,002</td>
										<td>random</td>
										<td>data</td>
										<td>placeholder</td>
										<td>text</td>
									</tr>
								</tbody>
							</table>
						</div>
					</main>
				</div>
			</div>
		<?php } ?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
	</body>
</html>
