<header class="container">
	<hgroup>
		<h1><?= $h1 ?></h1>
		<p><?= $p ?></p>
	</hgroup>
	<div>
		<nav>
			<ul>				
				<div><a href="/admin-rooms" role="button">Manage Rooms</a></div>

				<div><a href="/admin-schedules" role="button">Manage Schedules</a></div>

				
				<div>
					<details class="dropdown">
						<summary role="button" class="secondary theme-btn">Theme</summary>
						<ul>
							<li>
								<a href="#" data-theme-switcher="auto">Auto</a>
							</li>
							<li>
								<a href="#" data-theme-switcher="light">Light</a>
							</li>
							<li>
								<a href="#" data-theme-switcher="dark">Dark</a>
							</li>
						</ul>
					</details>
				</div>

				<div><a href="/logout" role="button" class="contrast">Log out</a></div>

			</ul>
		</nav>
	</div>
</header>