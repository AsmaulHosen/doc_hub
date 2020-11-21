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
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="modern-img-feature">
                            <img src="img/login_img.jpg" alt="#">

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Start Login form -->
                        <div class="contact-form-area m-top-30">
                            <h4>Login Here</h4>
                            <form id="login-form" action="loginChecker.php" method="post" role="form" style="display: block;">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-envelope"></i></div>
                                            <input type="email" name="email" placeholder="Please Type Your Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-key"></i></div>
                                            <input type="password" name="password" placeholder="Please Type Your Password" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <a href="registration.php"><i class="fa fa-user"></i> Don't Have Account ??</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="bizwheel-btn theme-2">Login</button>
                                        </div>
                                    </div>
                                </div>
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