<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick=openURL('index.php') class="logo">
			<img src="assets/images/icons/logo.png">
		</span>


		<div class="group">

			<div class="navItem">
				<span role="link" tabindex="0" onclick=openURL('search.php') class="navItemLink">Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick=openURL('browse.php') class="navItemLink">Browse</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick=openURL('yourMusic.php') class="navItemLink">Your Music</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick=openURL('settings.php') class="navItemLink"><?php   $userLoggedIn = $_SESSION['userLoggedIn'];
        			$user = new User($con,$userLoggedIn);	echo $user->getFullName(); ?></span>
			</div>
		</div> 
	</nav>
</div>