<nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
	<div class="position-sticky pt-3">

		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Manage</h6>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'proposals') echo "active"; ?>" href="/?mode=proposals&action=add">Proposals</a>
			</li>
			<?php foreach ($nav_elements as $nav_element) { ?>
				<li class="nav-item">
					<a class="nav-link <?php if ($mode === $nav_element) echo "active"; ?>" href="/?mode=<?php echo $nav_element; ?>"><?php echo format($nav_element); ?></a>
				</li>
			<?php } ?>
		</ul>

		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Reports</h6>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Project Billing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Projected Billing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Project Deadline</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Work Projection</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Project Info</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Work In-Progress</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($mode === 'projects') echo "active"; ?>" href="/?mode=projects&action=add">Open Proposals</a>
			</li>
		</ul>

	</div>
</nav>
