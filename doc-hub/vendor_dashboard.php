<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php include_once 'includes/head.php'; ?>
<!--/ End Head -->
<?php
if (!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false) {
    header("Location: index.php");
}
?>

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
        <?php

        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users,vendor_details WHERE users.user_id = vendor_details.user_id AND users.user_id = $user_id;";
        include_once 'database/dbCon.php';
        $con = connect();
        $result = $con->query($sql);
        foreach ($result as $row) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $vendor_id  = $row['vendor_id'];
            $vendor_name = $row['vendor_name'];
            $address = $row['address'];
            $phone_no = $row['phone_no'];
            $image = $row['image'];
        }
        ?>

        <section class="services section-bg ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2col-12">
                        <div class="single-f-news">
                            <div class="post-thumb">
                                <?php if ($image) {
                                ?>
                                    <a href="#"><img src="img/vendor/<?php echo $image; ?>" alt="#"></a><br>
                                <?php
                                } else {
                                ?>
                                    <a href="#"><img src="img/vendor.png" alt="#"></a><br>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-12">
                        <section class="services section-bg ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="section-title  style2 text-center">
                                            <div class="section-top">
                                                <h1><span>Personal Information</span><b>Edit Your Profile</b></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Single Service -->
                                        <div class="contact-form-area">
                                            <form action="vendor/updateProfile.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                                                    <input type="hidden" value="<?php echo $vendor_id; ?>" name="vendor_id">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>First Name</span>
                                                            <input type="text" name="first_name" value="<?php echo $first_name; ?>" placeholder="Please Type Your First Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>Last Name</span>
                                                            <input type="text" name="last_name" value="<?php echo $last_name; ?>" placeholder="Please Type Your Last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>Contact No.</span>
                                                            <input type="number" name="phone_no" value="<?php echo $phone_no; ?>" placeholder="Please Type Vendor Contact No" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Vendor Name / Company Name / Shop Name</span>
                                                            <input type="text" name="vendor_name" value="<?php echo $vendor_name; ?>" placeholder="Please Type Vendor Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Address </span>
                                                            <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Please Type Vendor Address" required>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="bizwheel-btn theme-2">Update</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!--/ End Single Service -->
                                </div>
                            </div>
                    </div>
        </section>
    </div>
    </div>
    </div>
    </section>
    <!-- Footer -->
    <?php include_once 'includes/footer.php'; ?>
    <!--/End Footer -->

    <!-- Footer script -->
    <?php include_once 'includes/footer_script.php'; ?>
    <!--/End Footer -->

</body>

</html>