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
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="modern-img-feature">
                            <img src="img/registration.jpg" alt="#">

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <!-- Start Login form -->
                        <div class="contact-form-area m-top-30">
                            <h4>Registration Here </h4>
                            <form class="form" method="post" action="">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-user"></i></div>
                                            <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-user"></i></div>
                                            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <select id="user_role" name="user_role" class="form-control" required>
                                                <option value="">Please Select</option>
                                                <option value="1">Patient</option>
                                                <option value="2">Doctor</option>
                                                <option value="3">Vendor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-envelope"></i></div>
                                            <input type="email" name="email" id="email" placeholder="Please Type Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-key"></i></div>
                                            <input type="password" name="password" id="password" placeholder="Password" minlength="6" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-key"></i></div>
                                            <input type="password" name="con_password" id="con_password" placeholder="Confirm Password" oninput="check(this)" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <a href="login.php"><i class="fa fa-user"></i> Already Register ??</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <input type="submit" class="bizwheel-btn theme-2" value="Register">
                                            <!-- <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Here"> -->
                                        </div>
                                    </div>
                                </div>
                                <?php
                                include_once 'database/dbCon.php';
                                $con = connect();


                                if ($_POST) {
                                    $user_id = rand(0, 999999);
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $user_role = $_POST['user_role'];
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];

                                    $check = "SELECT * FROM users WHERE email = '$email'";
                                    $rs = mysqli_query($con, $check);
                                    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                                    if (isset($data)) {
                                        echo "<script type= 'text/javascript'>MyEmailWarningFn();</script>";
                                    } else {
                                        $sql = "INSERT INTO users(user_id,first_name,last_name,user_role,email,password,status) 
                                        VALUES ('$user_id','$first_name','$last_name','$user_role','$email','$password',1);";

                                        if ($con->query($sql) === TRUE) {
                                            if ($user_role == 1) {
                                                $sql2 = "INSERT INTO patient_details (user_id) VALUES ('$user_id');";
                                            } elseif ($user_role == 2) {
                                                $sql2 = "INSERT INTO doctors_deatils (user_id) VALUES ('$user_id');";
                                            } elseif ($user_role == 3) {
                                                $sql2 = "INSERT INTO vendor_details (user_id) VALUES ('$user_id');";
                                            }
                                            if ($con->query($sql2) === TRUE) {
                                                echo "<script type= 'text/javascript'>MyRegistrationSuccessFn();</script>";
                                            } else {
                                                echo "<script type= 'text/javascript'>MyRegistrationWarningFn();</script>";
                                            }
                                        } else {
                                            echo "<script type= 'text/javascript'>MyRegistrationWarningFn();</script>";
                                        }
                                    }
                                }

                                ?>
                            </form>
                        </div>
                        <!--/ End Login Form -->
                    </div>
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