<header class="header">
	<!-- Topbar -->
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-12">
					<!-- Top Contact -->
					<div class="top-contact">
						<div class="single-contact"><i class="fa fa-envelope-open"></i>Email: info@rizouan.com</div>
						<div class="single-contact"><i class="fa fa-clock-o"></i>Open 24 hours</div>
						<?php
						if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
							if ($_SESSION['user_role'] == 1) {
						?>
								<div class="single-contact"><i class="fa fa-user"></i>You are Login as A Patient</div>
						<?php }
						} ?>
						<?php
						if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
							if ($_SESSION['user_role'] == 2) {
						?>
								<div class="single-contact"><i class="fa fa-user-md"></i>You are Login as A Doctor</div>
						<?php }
						} ?>
						<?php
						if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
							if ($_SESSION['user_role'] == 3) {
						?>
								<div class="single-contact"><i class="fa fa-hospital-o"></i>You are Login as A Vendor</div>
						<?php }
						} ?>


					</div>
					<!-- End Top Contact -->
				</div>
				<div class="col-lg-4 col-md-8 col-12">
					<div class="topbar-right">
						<!-- Social Icons -->
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Topbar -->
	<!-- Middle Header -->
	<div class="middle-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="middle-inner">
						<div class="row">
							<div class="col-lg-2 col-md-3 col-12">
								<!-- Logo -->
								<div class="logo">
									<!-- Image Logo -->
									<div class="img-logo">
										<a href="index.php">
											<img src="img/logo.png" alt="#">
										</a>
									</div>
								</div>
								<div class="mobile-nav"></div>
							</div>
							<div class="col-lg-10 col-md-9 col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">
											<div class="nav-inner">
												<div class="menu-home-menu-container">
													<!-- Naviagiton -->
													<ul id="nav" class="nav main-menu menu navbar-nav">
														<li><a href="index.php">Home</a></li>
														<li><a href="doctor_all.php">Our Doctor's</a></li>
														<li><a href="vendor_all.php">Our Vendor's</a></li>
														<?php
														if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
															if ($_SESSION['user_role'] == 1) {
														?>
																<li><a href="my_appoinment.php">My Appoinment</a></li>
														<?php }
														} ?>
														<?php
														if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
															if ($_SESSION['user_role'] == 2) {
														?>
																<li><a href="my_appoinment_list.php">My List</a></li>
														<?php }
														} ?>
														<?php
														if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
															if ($_SESSION['user_role'] == 3) {
														?>
																<li><a href="patient_list.php">My List</a></li>
																<li><a href="my_store.php">My Store</a></li>
																
														<?php }
														} ?>
														<!-- <li><a href="about.php">About Us</a></li>
														<li><a href="contact.php">Contact Us</a></li> -->

													</ul>
													<!--/ End Naviagiton -->
												</div>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->
									<!-- Right Bar -->
									<div class="right-bar">
										<!-- Search Bar -->
										<ul class="right-nav">
											<?php
											if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
												if ($_SESSION['user_role'] == 1) {
											?>
													<li><a href="patient_dashboard.php" title="My Dashboard"><i class="fa fa-user" aria-hidden="true"></i></a></li>
													<li><a onclick="MyLogoutFn()" title="Logout Here"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
												<?php
												} elseif ($_SESSION['user_role'] == 2) {
												?>
													<li><a href="doctor_dashboard.php" title="My Dashboard"><i class="fa fa-user-md" aria-hidden="true"></i></a></li>
													<li><a onclick="MyLogoutFn()" title="Logout Here"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
												<?php
												} elseif ($_SESSION['user_role'] == 3) {
												?>
													<li><a href="vendor_dashboard.php" title="My Dashboard"><i class="fa fa-hospital-o" aria-hidden="true"></i></a></li>
													<li><a onclick="MyLogoutFn()" title="Logout Here"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
												<?php
												}
											} else {
												?>
												<li><a href="login.php" title="Login Here"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
												<li><a href="registration.php" title="Registration Here"><i class="fa fa-registered" aria-hidden="true"></i></a></li>
											<?php
											}
											?>

										</ul>
										<!--/ End Search Bar -->

									</div>
									<!--/ End Right Bar -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Middle Header -->

</header>