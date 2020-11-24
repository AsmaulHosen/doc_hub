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
        $sql = "SELECT * FROM users,doctors_deatils WHERE users.user_id = doctors_deatils.user_id AND users.user_id = $user_id;";
        include_once 'database/dbCon.php';
        $con = connect();
        $result = $con->query($sql);
        foreach ($result as $row) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $contact_number = $row['contact_number'];
            $gender = $row['gender'];
            $image = $row['image'];
            $about = $row['about'];
            $doctors_id = $row['doctors_id'];
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
                    <div class="col-lg-6 col-md-6 col-12">
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


                                            <form action="doctors/updateProfile.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                                                    <input type="hidden" value="<?php echo $doctors_id; ?>" name="doctors_id">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>First Name</span>
                                                            <input type="text" name="first_name" value="<?php echo $first_name; ?>" placeholder="Please Type Your Email Address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Last Name</span>
                                                            <input type="text" name="last_name" value="<?php echo $last_name; ?>" placeholder="Please Type Your Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Contact No.</span>
                                                            <input type="number" name="contact_number" value="<?php echo $contact_number; ?>" placeholder="Please Type Your Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Gender</span>
                                                            <select id="gender" name="gender" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($gender == "1") echo 'selected="selected"'; ?>> Male </option>
                                                                <option value="2" <?php if ($gender == "2") echo 'selected="selected"'; ?>> Female </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group textarea">
                                                            <span>About Yourself</span>
                                                            <textarea type="textarea" name="about" rows="3"><?php echo $about; ?></textarea>
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
                    <div class="col-lg-4 col-md-4 col-12">
                        <h1>Chart Section</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="services section-bg section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <section class="services section-bg ">
                            <div class="container">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <h3>Education History</h3>
                                        <!-- Single Service -->
                                        <div class="contact-form-area">
                                            <form action="doctors/academic_info.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $doctors_id; ?>" name="doctors_id">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="form-group">
                                                            <span>Institute Name</span>
                                                            <input type="text" name="institute_name" placeholder="Please Type Your Institute Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Degree Name</span>
                                                            <input type="text" name="degree" placeholder="Please Type Your Degree Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Passing Year</span>
                                                            <select id="year" name="year" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <?php for ($x = 1970; $x <= 2020; $x++) { ?>
                                                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="bizwheel-btn theme-2">Add Information</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="table-responsive">
                                                <h5>Education History List</h5>
                                                <hr>
                                                <table class="table table-hover table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Institute Name</th>
                                                            <th>Degree Name</th>
                                                            <th>Passing Year</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `education_history` where doctors_id = $doctors_id;";
                                                        include_once 'database/dbCon.php';
                                                        $con = connect();
                                                        $result_edu = $con->query($sql);
                                                        if (!empty($result_edu)) {
                                                            foreach ($result_edu as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $row['institute_name'] ?></td>
                                                                    <td><?= $row['degree'] ?></td>
                                                                    <td><?= $row['year'] ?></td>
                                                                    <td> <a class="btn btn-danger" href="doctors/educationDelete.php?education_id=<?= $row['education_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="4" class="text-danger">No Result Found</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!--/ End Single Service -->

                                        <!-- Single Service -->

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <section class="services section-bg ">
                            <div class="container">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <h3>Experience History</h3>
                                        <!-- Single Service -->
                                        <div class="contact-form-area">
                                            <form action="doctors/experience_info.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $doctors_id; ?>" name="doctors_id">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="form-group">
                                                            <span>Hospital Name</span>
                                                            <input type="text" name="hospital_name" placeholder="Please Type Your Hospital Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Position Name</span>
                                                            <input type="text" name="position_name" placeholder="Please Type Your Poition Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Department Name</span>
                                                            <input type="text" name="department_name" placeholder="Please Type Your Department Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>Start Year</span>
                                                            <select id="start_year" name="start_year" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <?php for ($x = 1970; $x <= 2020; $x++) { ?>
                                                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <span>End Year</span>
                                                            <select id="end_year" name="end_year" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <?php for ($x = 1970; $x <= 2020; $x++) { ?>
                                                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                                <?php } ?>
                                                                <option value="Running">Running</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="bizwheel-btn theme-2">Add Experience </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="table-responsive">
                                                <h5>Experience History List</h5>
                                                <hr>
                                                <table class="table table-hover table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Hospital Name</th>
                                                            <th>Position Name</th>
                                                            <th>Department Name</th>
                                                            <th>Duration</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `experienced` where doctors_id = $doctors_id;";
                                                        include_once 'database/dbCon.php';
                                                        $con = connect();
                                                        $result_exp = $con->query($sql);
                                                        if (!empty($result_exp)) {
                                                            foreach ($result_exp as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $row['hospital_name'] ?></td>
                                                                    <td><?= $row['position_name'] ?></td>
                                                                    <td><?= $row['department_name'] ?></td>
                                                                    <td><?= $row['start_year'] ?> - <?= $row['end_year'] ?></td>
                                                                    <td> <a class="btn btn-danger" href="doctors/experiencedDelete.php?experienced_id=<?= $row['experienced_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="5" class="text-danger">No Result Found</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!--/ End Single Service -->

                                        <!-- Single Service -->

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <section class="services section-bg ">
                            <div class="container">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <h3>Specialties History</h3>
                                        <!-- Single Service -->
                                        <div class="contact-form-area">
                                            <form action="doctors/specialties_info.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $doctors_id; ?>" name="doctors_id">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="form-group">
                                                            <span>Specialties </span>
                                                            <input type="text" name="name" placeholder="Please Type Your Speciality" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="bizwheel-btn theme-2">Add Specialties </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="table-responsive">
                                                <h5>Specialties History List</h5>
                                                <hr>
                                                <table class="table table-hover table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Specialties </th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `speciality` where doctors_id = $doctors_id;";
                                                        include_once 'database/dbCon.php';
                                                        $con = connect();
                                                        $result_specia  = $con->query($sql);
                                                        if (!empty($result_specia)) {
                                                            foreach ($result_specia as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $row['name'] ?></td>
                                                                    <td> <a class="btn btn-danger" href="doctors/specialtiesDelete.php?speciality_id=<?= $row['speciality_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="2" class="text-danger">No Result Found</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!--/ End Single Service -->

                                        <!-- Single Service -->

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <section class="services section-bg ">
                            <div class="container">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <h3>Appointment Slot History</h3>
                                        <!-- Single Service -->
                                        <div class="contact-form-area">
                                            <form action="doctors/appoinment_info.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $doctors_id; ?>" name="doctors_id">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>Start Time </span>
                                                            <input type="time" name="start_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>End Time </span>
                                                            <input type="time" name="end_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>Charge </span>
                                                            <input type="number" name="fees" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="bizwheel-btn theme-2">Add Time</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="table-responsive">
                                                <h5>Appointment Slot History List</h5>
                                                <hr>
                                                <table class="table table-hover table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Appointment Time </th>
                                                            <th>Charge</th>
                                                            <th>Status</th>
                                                            <th colspan="2">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `appointment_slot` where doctors_id = $doctors_id;";
                                                        include_once 'database/dbCon.php';
                                                        $con = connect();
                                                        $result_specia  = $con->query($sql);
                                                        if (!empty($result_specia)) {
                                                            foreach ($result_specia as $row) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $row['start_time'] ?> to <?= $row['end_time'] ?></td>
                                                                    <td><?= $row['fees'] ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($row['available'] == 1) {
                                                                            echo "Open";
                                                                        } else {
                                                                            echo "Close";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($row['available'] == 1) {
                                                                        ?>
                                                                            <a class="btn btn-warning" title="Close This" href="doctors/appoinmentStatusclose.php?appointment_id=<?= $row['appointment_id'] ?>"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <a class="btn btn-info" title="Open This" href="doctors/appoinmentStatusopen.php?appointment_id=<?= $row['appointment_id'] ?>"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td> <a class="btn btn-danger" href="doctors/appoinmentDelete.php?appointment_id=<?= $row['appointment_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="2" class="text-danger">No Result Found</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!--/ End Single Service -->

                                        <!-- Single Service -->

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
    </div>
</body>

</html>