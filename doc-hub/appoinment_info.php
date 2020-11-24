<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php include_once 'includes/head.php'; ?>
<!--/ End Head -->
<?php
if (!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false) {
    header("Location: index.php");
}

$appointment_id = $_GET['appointment_id'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `appointment_slot`WHERE appointment_id = $appointment_id;";
include_once 'database/dbCon.php';
$con = connect();
$result = $con->query($sql);
foreach ($result as $row) {
    $doctors_id = $row['doctors_id'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
    $fees = $row['fees'];
}
$date_start = new DateTime($start_time);
$date_end = new DateTime($end_time);

$sql_pat = "SELECT * FROM users,patient_details WHERE users.user_id = patient_details.user_id AND users.user_id = $user_id;";
$result_pat = $con->query($sql_pat);
foreach ($result_pat as $row_pat) {
    $patient_id  = $row_pat['patient_id'];
}


function generateRandomString()
{
    $characters = '0123456789';
    $length = 4;
    $charactersLength = strlen($characters);
    $randomString = 'DoH-A-';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$appoinment_num = generateRandomString();
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

        <section class="services section-bg section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Start Login form -->
                        <div class="contact-form-area m-top-30">
                            <h4>Book Here - <span>Doctor's Appoinment</span></h4>
                            <hr>
                            <form action="patient/appoinmentconfirm.php" method="post">
                                <input type="hidden" name="patient_id" value="<?php echo $patient_id ?>">
                                <input type="hidden" name="doctors_id" value="<?php echo $doctors_id ?>">

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <span><b>Appoinment Number :</b> <?php echo $appoinment_num; ?></span>
                                        <input type="hidden" value="<?php echo $appoinment_num; ?>" name="appointment_id">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <span><b>Time :</b> <?php echo $date_start->format('h:i A ') ?>To <?php echo $date_end->format('h:i A ') ?></span>
                                        <input type="hidden" value="<?php echo $start_time; ?>" name="start_time">
                                        <input type="hidden" value="<?php echo $end_time; ?>" name="end_time">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <span><b>Charge :</b> <?php echo $fees; ?> Taka </span><br>
                                        <span><small class="text-danger">** You have to make the full payment</small></span>
                                        <input type="hidden" value="<?php echo $fees; ?>" name="fees">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" placeholder="Please Type Your Appoinment Date" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <select name="payment_method" id="payment_method" class="form-control" required>
                                                <option value="">Please Select </option>
                                                <option value="0">Bkash</option>
                                                <option value="1">Rocket</option>
                                                <option value="2">Debit Card</option>
                                                <option value="3">Master Card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="paymeny_desc" placeholder="Bkash / Rocket Transaction Number, Debit / Master Card Number" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="bizwheel-btn theme-2">Book Here</button>
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
        <!-- Footer -->
        <?php include_once 'includes/footer.php'; ?>
        <!--/End Footer -->

        <!-- Footer script -->
        <?php include_once 'includes/footer_script.php'; ?>
        <!--/End Footer -->

</body>

</html>