<nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
	<div class="position-sticky pt-3">
		<ul class="nav flex-column">
			<?php foreach ($nav_elements as $nav_element) { ?>
				<li class="nav-item">
					<a class="nav-link <?php if ($mode === $nav_element) echo "active"; ?>" href="/?mode=<?php echo $nav_element; ?>"><?php echo format($nav_element); ?></a>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>
