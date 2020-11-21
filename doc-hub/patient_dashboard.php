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
        $sql = "SELECT * FROM users,patient_details WHERE users.user_id = patient_details.user_id AND users.user_id = $user_id;";
        include_once 'database/dbCon.php';
        $con = connect();
        $result = $con->query($sql);
        foreach ($result as $row) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $patient_id   = $row['patient_id'];
            $gender = $row['gender'];
            $image = $row['image'];
            $about = $row['about'];
            $date_of_birth = $row['date_of_birth'];
            $wrok_desc = $row['wrok_desc'];
            $religion = $row['religion'];
            $height  = $row['height'];
            $weight = $row['weight'];
            $blood_grp = $row['blood_grp'];
            $high_pressure = $row['high_pressure'];
            $blood_sugar = $row['blood_sugar'];
            $contact_number = $row['contact_number'];
            $present_address = $row['present_address'];
            $perrmanent_address = $row['perrmanent_address'];
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
                                    <a href="#"><img src="img/patient.png" alt="#"></a><br>
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
                                            <form action="patient/updateProfile.php" method="post" role="form" style="display: block;">
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                                                    <input type="hidden" value="<?php echo $patient_id; ?>" name="patient_id">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>First Name</span>
                                                            <input type="text" name="first_name" value="<?php echo $first_name; ?>" placeholder="Please Type Your Email Address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>Last Name</span>
                                                            <input type="text" name="last_name" value="<?php echo $last_name; ?>" placeholder="Please Type Your Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <span>Gender</span>
                                                            <select id="gender" name="gender" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($gender == "1") echo 'selected="selected"'; ?>> Male </option>
                                                                <option value="2" <?php if ($gender == "2") echo 'selected="selected"'; ?>> Female </option>
                                                                <option value="0" <?php if ($gender == "0") echo 'selected="selected"'; ?>> Others </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Date of Birth</span>
                                                            <input type="date" name="date_of_birth" value="<?php echo $date_of_birth; ?>" placeholder="Please Type Your date of birth" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Religion</span>
                                                            <select id="religion" name="religion" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($religion == "1") echo 'selected="selected"'; ?>> Islam </option>
                                                                <option value="2" <?php if ($religion == "2") echo 'selected="selected"'; ?>> Hinduism </option>
                                                                <option value="3" <?php if ($religion == "3") echo 'selected="selected"'; ?>> Christianity </option>
                                                                <option value="4" <?php if ($religion == "4") echo 'selected="selected"'; ?>> Buddhism </option>
                                                                <option value="0" <?php if ($religion == "0") echo 'selected="selected"'; ?>> others </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Height</span>
                                                            <select id="height" name="height" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($height == "1") echo 'selected="selected"'; ?>> 4ft -5ft </option>
                                                                <option value="2" <?php if ($height == "2") echo 'selected="selected"'; ?>> 5ft 1" -5ft </option>
                                                                <option value="3" <?php if ($height == "3") echo 'selected="selected"'; ?>> 5ft 4" -5ft 8" </option>
                                                                <option value="4" <?php if ($height == "4") echo 'selected="selected"'; ?>> 5ft 9" -5ft 11" </option>
                                                                <option value="5" <?php if ($height == "5") echo 'selected="selected"'; ?>> 6ft -6ft 2" </option>
                                                                <option value="6" <?php if ($height == "6") echo 'selected="selected"'; ?>> 6ft 3" - 6ft 6" </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Weight</span>
                                                            <select id="weight" name="weight" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($weight == "1") echo 'selected="selected"'; ?>> 0 - 40 (kg)</option>
                                                                <option value="2" <?php if ($weight == "2") echo 'selected="selected"'; ?>> 41-60 (kg)</option>
                                                                <option value="3" <?php if ($weight == "3") echo 'selected="selected"'; ?>> 61-80 (kg)</option>
                                                                <option value="4" <?php if ($weight == "4") echo 'selected="selected"'; ?>> 81-100 (kg)</option>
                                                                <option value="5" <?php if ($weight == "5") echo 'selected="selected"'; ?>> 101-120 (kg)</option>
                                                                <option value="6" <?php if ($weight == "6") echo 'selected="selected"'; ?>> 121-140 (kg)</option>
                                                                <option value="7" <?php if ($weight == "7") echo 'selected="selected"'; ?>> 141-160 (kg)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Contact No.</span>
                                                            <input type="number" name="contact_number" value="<?php echo $contact_number; ?>" placeholder="Please Type Your Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Blood Group</span>
                                                            <select id="blood_grp" name="blood_grp" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($blood_grp == "1") echo 'selected="selected"'; ?>> A+</option>
                                                                <option value="2" <?php if ($blood_grp == "2") echo 'selected="selected"'; ?>> A-</option>
                                                                <option value="3" <?php if ($blood_grp == "3") echo 'selected="selected"'; ?>> B+</option>
                                                                <option value="4" <?php if ($blood_grp == "4") echo 'selected="selected"'; ?>> B-</option>
                                                                <option value="5" <?php if ($blood_grp == "5") echo 'selected="selected"'; ?>> O+</option>
                                                                <option value="6" <?php if ($blood_grp == "6") echo 'selected="selected"'; ?>> O-</option>
                                                                <option value="7" <?php if ($blood_grp == "7") echo 'selected="selected"'; ?>> AB+</option>
                                                                <option value="8" <?php if ($blood_grp == "8") echo 'selected="selected"'; ?>> AB-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>High Pressure</span>
                                                            <select id="high_pressure" name="high_pressure" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($high_pressure == "1") echo 'selected="selected"'; ?>> Yes </option>
                                                                <option value="2" <?php if ($high_pressure == "2") echo 'selected="selected"'; ?>> No </option>
                                                                <option value="3" <?php if ($high_pressure == "3") echo 'selected="selected"'; ?>> Don't Know </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <span>Blood Sugar</span>
                                                            <select id="blood_sugar" name="blood_sugar" class="form-control" required>
                                                                <option value="">Please Select</option>
                                                                <option value="1" <?php if ($blood_sugar == "1") echo 'selected="selected"'; ?>> Yes </option>
                                                                <option value="2" <?php if ($blood_sugar == "2") echo 'selected="selected"'; ?>> No </option>
                                                                <option value="3" <?php if ($blood_sugar == "3") echo 'selected="selected"'; ?>> Don't Know </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group textarea">
                                                            <span>Work Description</span>
                                                            <textarea type="textarea" name="wrok_desc" rows="3"><?php echo $wrok_desc; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group textarea">
                                                            <span>About Yourself</span>
                                                            <textarea type="textarea" name="about" rows="3"><?php echo $about; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group textarea">
                                                            <span>Present Address</span>
                                                            <textarea type="textarea" name="present_address" rows="3"><?php echo $present_address; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group textarea">
                                                            <span>Permanent Address</span>
                                                            <textarea type="textarea" name="perrmanent_address" rows="3"><?php echo $perrmanent_address; ?></textarea>
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
        <section class="services section-bg section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3>Medical Report History</h3>
                        <!-- Single Service -->
                        <div class="contact-form-area">
                            <form action="patient/medical_history.php" method="post" role="form" style="display: block;" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" value="<?php echo $patient_id; ?>" name="patient_id">
                                    <div class="col-12 col-lg-6 col-md-6 ">
                                        <div class="form-group textarea">
                                            <span>File Description</span>
                                            <textarea type="textarea" name="medical_desc" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 ">
                                        <div class=" form-group ">
                                            <span>Image</span>
                                            <input class=" form-control" id="fileToUpload" name="fileToUpload" type="file" required>
                                        </div>

                                        <div class="form-group button">
                                            <button type="submit" class="bizwheel-btn theme-2">Add Report</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="table-responsive">
                                <h5>Medical Report History List</h5>
                                <hr>
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>File Description</th>
                                            <th>View File</th>
                                            <th>created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `medical_report_history` where patient_id = $patient_id;";
                                        include_once 'database/dbCon.php';
                                        $con = connect();
                                        $result_edu = $con->query($sql);
                                        if (!empty($result_edu)) {
                                            foreach ($result_edu as $row) {
                                        ?>
                                                <tr>
                                                    <td><?= $row['medical_desc'] ?></td>
                                                    <td><a class="btn btn-info" target="_blank" href="img/patient/medical_history/<?= $row['image'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> </a></td>
                                                    <td><?= $row['created_at'] ?></td>
                                                    <td> <a class="btn btn-danger" href="patient/medicalHistoryDelete.php?medical_report_id=<?= $row['medical_report_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
        <!-- Footer -->
        <?php include_once 'includes/footer.php'; ?>
        <!--/End Footer -->

        <!-- Footer script -->
        <?php include_once 'includes/footer_script.php'; ?>
        <!--/End Footer -->

</body>

</html>