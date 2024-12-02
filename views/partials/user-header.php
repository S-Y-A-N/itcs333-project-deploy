<header class="container">
	<hgroup>
		<h1><?= $h1 ?></h1>
		<p><?= $p ?></p>
	</hgroup>
	<div>
		<nav>
			<ul>				
				<div><a href="/bookings" role="button">My Bookings</a></div>

				<div><a href="/profile" role="button">Profile</a></div>
				
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