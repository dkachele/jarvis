<body id="dashboard">
	<?php require_once('../skin/header.php'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php require_once('../skin/nav.php'); ?>
			<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2"><?php echo format($mode); ?> <a href="/?mode=<?php echo $mode; ?>&action=add">+</a></h1>
				</div>
				<?php require_once('../lib/context.php'); ?>
				<?php if (!empty($results)) { ?>
					<?php require_once('../skin/' . $action . '.php'); ?>
				<?php } ?>
			</main>
		</div>
	</div>
