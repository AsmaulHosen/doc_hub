<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php include_once 'includes/head.php'; ?>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<!--/ End Head -->
<?php
if (!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false) {
    header("Location: index.php");
}
if ($_SESSION['user_role'] == 2) {
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
            $appoinment_book_id = $_GET['appoinment_book_id'];
            $user_id = $_SESSION['user_id'];
            include_once 'database/dbCon.php';
            $con = connect();
            $sql_pat = "SELECT * FROM users,doctors_deatils WHERE users.user_id = doctors_deatils.user_id AND users.user_id = $user_id;";
            $result_pat = $con->query($sql_pat);
            foreach ($result_pat as $row_pat) {
                $doctors_id  = $row_pat['doctors_id'];
            }
            $sql = "SELECT appointment_book.*,users.first_name,users.last_name,patient_details.gender FROM appointment_book,patient_details ,users
        WHERE appointment_book.patient_id = patient_details.patient_id AND patient_details.user_id = users.user_id
        AND appointment_book.appoinment_book_id = '$appoinment_book_id' ";
            $result = $con->query($sql);
            foreach ($result as $row) {
                $first_name  = $row['first_name'];
                $last_name  = $row['last_name'];
                $gender  = $row['gender'];
                $patient_id  = $row['patient_id'];
                $start_time  = $row['start_time'];
                $end_time  = $row['end_time'];
            }
            ?>
            <section class="contact-us section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="contact-box-main m-top-30">
                                <div class="contact-title">
                                    <h2>Patient Details</h2>
                                </div>
                                <!-- Single Contact -->
                                <div class="single-contact-box">
                                    <div class="c-icon"><i class="fa fa-check-circle-o "></i></div>
                                    <div class="c-text">
                                        <h4>Appoinment Number</h4>
                                        <p><?php echo $appoinment_book_id; ?></p>
                                    </div>
                                </div>
                                <div class="single-contact-box">
                                    <div class="c-icon"><i class="fa fa-user"></i></div>
                                    <div class="c-text">
                                        <h4>Patient's Name</h4>
                                        <p><?php echo $first_name; ?> <?php echo $last_name; ?></p>
                                    </div>
                                </div>
                                <div class="single-contact-box">
                                    <div class="c-icon">
                                        <?php
                                        if ($gender == 1) {
                                        ?>
                                            <i class="fa fa-male"></i>
                                        <?php
                                        } else if ($gender == 2) {
                                        ?>
                                            <i class="fa fa-female"></i>
                                        <?php
                                        } else {
                                        ?>
                                            <i class="fa fa-genderless"></i>
                                        <?php
                                        }

                                        ?>

                                    </div>
                                    <div class="c-text">
                                        <h4>Gender</h4>
                                        <p>
                                            <?php
                                            if ($gender == 1) {
                                            ?>
                                                Male
                                            <?php
                                            } else if ($gender == 2) {
                                            ?>
                                                Female
                                            <?php
                                            } else {
                                            ?>
                                                Others
                                            <?php
                                            }

                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <!--/ End Single Contact -->

                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="contact-title">
                                <h2>Prescription Details</h2>
                            </div>
                            <div class="contact-form-area m-top-30">
                                <form action="doctors/add_prescription.php" method="post">
                                    <div class="row">
                                        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                                        <input type="hidden" name="doctors_id" value="<?php echo $doctors_id; ?>">
                                        <input type="hidden" name="appoinment_book_id" value="<?php echo $appoinment_book_id; ?>">
                                        <input type="hidden" name="start_time" value="<?php echo $start_time; ?>">
                                        <input type="hidden" name="end_time" value="<?php echo $end_time; ?>">

                                        <div class="col-12">
                                            <div class="form-group textarea">
                                                <div class="icon"><i class="fa fa-pencil"></i></div>
                                                <textarea type="textarea" class="form-control" id="summernote" name="desc" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="form-group textarea">
                                                <div class="icon"><i class="fa fa-pencil"></i></div>
                                                <textarea type="textarea" class="form-control" name="special_note" placeholder="Any Special Note"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group button">
                                                <button type="submit" class="bizwheel-btn theme-2">Complete</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--/ End contact Form -->
                        </div>

                    </div>
                </div>
            </section>

            <!-- Footer -->
            <?php include_once 'includes/footer.php'; ?>
            <!--/End Footer -->
            <script>
                $('#summernote').summernote({
                    placeholder: 'Type Here',
                    tabsize: 2,
                    height: 400
                });
            </script>
            <!-- Footer script -->
            <?php include_once 'includes/footer_script.php'; ?>
            <!--/End Footer -->

    </body>
<?php } else {
    header("Location: index.php");
} ?>

</html>