<header class="container">
	<hgroup>
		<h1><?= $h1 ?></h1>
		<p><?= $p ?></p>
	</hgroup>
	<div>
		<nav>
			<ul>				
				<div><a href="/profile" role="button" class="secondary">Profile</a></div>
				
				<div>
					<details class="dropdown">
						<summary role="button" class="secondary">Theme</summary>
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

				<li><a href="/bookings" class="contrast">My Bookings</a></li>

				<li><a href="/profile" class="contrast">Profile</a></li>

				<li><a href="/logout" class="contrast">Log out</a></li>


			</ul>
		</nav>
	</div>
</header>