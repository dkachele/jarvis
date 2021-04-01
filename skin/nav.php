<nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
	<div class="position-sticky pt-3">
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Tools</h6>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'propsals') echo "active"; ?>" href="/?mode=proposals">Proposals</a>
			</li>
		</ul>

		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Admin</h6>
		<ul class="nav flex-column">
			<?php foreach ($nav_elements as $nav_element) { ?>
				<li class="nav-item">
					<a class="nav-link <?php if ($mode === $nav_element) echo "active"; ?>" href="/?mode=<?php echo $nav_element; ?>"><?php echo format($nav_element); ?></a>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>
