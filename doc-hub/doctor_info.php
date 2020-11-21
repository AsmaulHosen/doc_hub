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
        <?php
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM users,doctors_deatils WHERE users.user_id = doctors_deatils.user_id AND users.user_id = $user_id;";
        include_once 'database/dbCon.php';
        $con = connect();
        $result = $con->query($sql);
        foreach ($result as $row) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $contact_number = $row['contact_number'];
            $image = $row['image'];
            $about = $row['about'];
            $doctors_id = $row['doctors_id'];
        }
        $sql_edu = "SELECT * FROM education_history WHERE doctors_id = $doctors_id;";
        $result_edu = $con->query($sql_edu);

        $sql_exp = "SELECT * FROM experienced WHERE doctors_id = $doctors_id;";
        $result_exp = $con->query($sql_exp);

        $sql_spl = "SELECT * FROM speciality WHERE doctors_id = $doctors_id;";
        $result_spl = $con->query($sql_spl);

        $sql_apnt = "SELECT * FROM appointment_slot WHERE doctors_id = $doctors_id ORDER BY `appointment_slot`.`start_time` ASC;";
        $result_apnt = $con->query($sql_apnt);
        ?>

        <section class="contact-us section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-f-news">
                            <div class="post-thumb">
                                <?php if ($image) {
                                ?>
                                    <a href="#"><img src="img/doctors/<?php echo $image; ?>" alt="#"></a><br>
                                <?php
                                } else {
                                ?>
                                    <a href="#"><img src="img/user.png" alt="#"></a><br>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-12">
                        <div class="contact-box-main m-top-30">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="contact-title">
                                        <h2>About</h2>
                                        <p><?php echo $about; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-contact-box">
                                        <div class="c-icon"><i class="fa fa-user"></i></div>
                                        <div class="c-text">
                                            <h4>Full Name</h4>
                                            <p><?php echo $first_name; ?> <?php echo $last_name; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-contact-box">
                                        <div class="c-icon"><i class="fa fa-info-circle"></i></div>
                                        <div class="c-text">
                                            <h4>Contact</h4>
                                            <p><?php echo $email; ?></p>
                                            <p><?php echo $contact_number; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-contact-box">
                                        <div class="c-icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></div>
                                        <div class="c-text">
                                            <h4>Speciality</h4>
                                            <p>
                                                <?php
                                                foreach ($result_edu as $row) {
                                                    echo $row['institute_name'];
                                                }
                                                ?>
                                                <strong> , </strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="single-contact-box">
                                        <div class="c-text"><br>
                                            <h4>Appointment</h4>
                                            <hr>
                                            <div class="row">
                                                <?php
                                                foreach ($result_apnt as $row) {
                                                    $date_start = new DateTime($row['start_time']);
                                                    $date_end = new DateTime($row['end_time']);
                                                ?>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="portfolio-content">
                                                            <h4><?php echo $date_start->format('h:i A ') ?> To <?php echo $date_end->format('h:i A ') ?></h4>
                                                            <p><b>Fees :</b> <?= $row['fees']; ?> Taka</p>

                                                            <a href="<?= $row['fees']; ?>">Book -></a>

                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-us ">
            <div class="container">

                <div class="contact-box-main m-top-30">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single-contact-box">
                                <div class="c-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
                                <div class="c-text">
                                    <h4>Education</h4>
                                    <hr>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Institution Name</th>
                                                <th>Degree</th>
                                                <th>Passing Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result_edu as $row) {
                                                //  if($result_edu != ''){
                                            ?>
                                                <tr>
                                                    <td><?= $row['institute_name']; ?></td>
                                                    <td><?= $row['degree']; ?></td>
                                                    <td><?= $row['year']; ?></td>
                                                </tr>
                                            <?php 
                                            }
                                            // else{
                                        //     ?>
                                        <!-- //     <tr>
                                        //         <td colspan="3">No Education History</td>
                                        //     </tr> -->
                                           <?php
                                        //     }
                                        // } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single-contact-box">
                                <div class="c-icon"><i class="fa fa-medkit"></i></div>
                                <div class="c-text">
                                    <h4>Experience</h4>
                                    <?php
                                    if (!empty($result_exp) && $result_edu != "") {
                                    ?>
                                        <hr>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Hospital Name</th>
                                                    <th>Position</th>
                                                    <th>Department</th>
                                                    <th>Duration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($result_exp as $row) { ?>
                                                    <tr>
                                                        <td><?= $row['hospital_name']; ?></td>
                                                        <td><?= $row['position_name']; ?></td>
                                                        <td><?= $row['department_name']; ?></td>
                                                        <td><?= $row['start_year']; ?> to <?= $row['end_year']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    } else {
                                    ?>
                                        <p>No Education History Here</p>
                                    <?php
                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
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