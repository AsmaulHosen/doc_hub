<!-- Services -->
<section class="services section-bg section-space">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title style2 text-center">
					<div class="section-top">
						<h1><span>Creative Vendor</span><b>Our Vendor </b></h1>
						<h4>We provide quality service &amp; support..</h4>
					</div>
					<!-- <div class="section-bottom">
								<div class="text-style-two">
									<p>Aliquam Sodales Justo Sit Amet Urna Auctor Scelerisquinterdum Leo Anet Tempus Enim Esent Egetis Hendrerit Vel Nibh Vitae Ornar Sem Velit Aliquam</p>
								</div>
							</div> -->
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			include_once 'database/dbCon.php';
			$con = connect();
			$sql = "SELECT * FROM `vendor_details` limit 3";
			$result = $con->query($sql);
			foreach ($result as $row) {
			?>
				<div class="col-lg-4 col-md-4 col-12">
					<!-- Single Service -->
					<div class="single-service">
						<div class="service-head">
							<?php if ($row['image']) {
							?>
								<img src="img/vendor/<?= $row['image']; ?>" alt="#" style="height:410; width: 555px">
							<?php
							} else {
							?>
								<img src="img/vendor.png" alt="#" style="height:410; width: 555px">
							<?php
							}
							?>
							<div class="icon-bg"><i class="fa fa-handshake-o"></i></div>
						</div>
						<div class="service-content">
							<h4><a href="#"><?= $row['vendor_name']; ?></a></h4>
							<p><b>Phone : </b><?= $row['phone_no']; ?></p>
							<p><b>Address : </b><?= $row['address']; ?></p>
						</div>
					</div>
					<!--/ End Single Service -->
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>
<!--/ End Services -->