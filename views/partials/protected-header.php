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

				<div><a href="/logout" role="button" class="secondary contrast">Log out</a></div>
			</ul>
		</nav>
	</div>
</header>