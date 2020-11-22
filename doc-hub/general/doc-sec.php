<?php
include_once 'database/dbCon.php';
$con = connect();
?>
<!-- Features Area -->
<section class="features-area section-bg">
	<div class="container">
		<div class="row">
			<?php
			$sql = "SELECT * FROM users,doctors_deatils where users.user_id = doctors_deatils.user_id and users.status = 1  ORDER BY `users`.`created_at` DESC limit 4";
			$result = $con->query($sql);

			foreach ($result as $row) {
			?>
				<div class="col-lg-3 col-md-3 col-12">
					<!-- Single Service -->
					<div class="single-service">
						<div class="service-head">
							<?php if ($row['image']) {
							?>
								<img src="img/doctors/<?= $row['image'] ?>" alt="<?= $row['first_name'] ?> <?= $row['last_name'] ?>">
							<?php
							} else {
							?>
								<img src="img/user.png" alt="<?= $row['first_name'] ?> <?= $row['last_name'] ?>">
							<?php
							}
							?>
							<div class="icon-bg"><a href="doctor_info.php?user_id=<?= $row['user_id'] ?>"><i class="fa fa-info-circle"></i></a></div>
						</div>
						<div class="service-content">
							<h4><a href="#"><?= $row['first_name'] ?> <?= $row['last_name'] ?></a></h4>
							<p><?php echo substr($row['about'], 0, 90); ?> ...</p>
							<a class="btn" href="doctor_info.php?user_id=<?= $row['user_id'] ?>"><i class="fa fa-arrow-circle-o-right"></i>View More</a>
						</div>
					</div>
					<!--/ End Single Service -->
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!--/ End Features Area -->
<!-- Call To Action -->
<section class="call-action overlay" style="background-image:url('https://via.placeholder.com/1500x300')">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12">
				<div class="call-inner">
					<h2>To More Doctors & Their World-class Treatment</h2>
					<p><i>" Health is our greatest treasure and with incredible specialists. We all know that there is a better chance for the healthier population."</i></p>
				</div>
			</div>
			<div class="col-lg-3 col-12">
				<div class="button">
					<a href="doctor_all.php" class="bizwheel-btn">Our Doctor's</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Call to action -->