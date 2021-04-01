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
