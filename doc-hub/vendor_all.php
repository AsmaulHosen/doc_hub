<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php include_once 'includes/head.php'; ?>
<!--/ End Head -->

<body id="bg">

    <!-- Boxed Layout -->
    <div id="page" class="site boxed-layout">

        <!-- Preloader -->
        <div class="preeloader">
            <div class="preloader-spinner"></div>
        </div>
        <!--/ End Preloader -->

        <!-- Header -->
        <?php include_once 'includes/header.php'; ?>
        <!--/ End Header -->

        <!-- Services -->
        <section class="services section-bg section-space">
            <div class="container">
                <div class="row">
                    <?php
                    include_once 'database/dbCon.php';
                    $con = connect();
                    $sql = "SELECT * FROM `vendor_details` ";
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
                                    <p><i class="fa fa-mobile"></i> <b>Phone : </b><?= $row['phone_no']; ?></p>
                                    <p><i class="fa fa-map-marker"></i> <b>Address : </b><?= $row['address']; ?></p>
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
        <!-- Footer -->
        <?php include_once 'includes/footer.php'; ?>
        <!--/End Footer -->

        <!-- Footer script -->
        <?php include_once 'includes/footer_script.php'; ?>
        <!--/End Footer -->

</body>

</html>