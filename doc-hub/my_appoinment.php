<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php include_once 'includes/head.php'; ?>
<!--/ End Head -->
<?php
if (!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false) {
    header("Location: index.php");
}
if ($_SESSION['user_role'] == 1) {
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
            include_once 'database/dbCon.php';
            $con = connect();
            $sql_pat = "SELECT * FROM users,patient_details WHERE users.user_id = patient_details.user_id AND users.user_id = $user_id;";
            $result_pat = $con->query($sql_pat);
            foreach ($result_pat as $row_pat) {
                $patient_id  = $row_pat['patient_id'];
            }
            $sql = "SELECT appointment_book.*,users.first_name,users.last_name FROM appointment_book,doctors_deatils ,users
        WHERE appointment_book.doctors_id = doctors_deatils.doctors_id AND doctors_deatils.user_id = users.user_id
        AND appointment_book.patient_id = $patient_id ORDER BY `appointment_book`.`date` DESC";
            $result = $con->query($sql);
            ?>
            <section class="about-us section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="about-content section-title default text-left">
                                <div class="section-top">
                                    <h1><span>My Booking</span><b>Appoinment List</b></h1>
                                </div>
                                <div class="section-bottom table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Appoinment Number</th>
                                                <th>Doctor's Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Fees / Charge</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result as $row) {
                                                $date_start = new DateTime($row['start_time']);
                                                $date_end = new DateTime($row['end_time']);
                                            ?>
                                                <tr>
                                                    <td><?= $row['appoinment_book_id'] ?></td>
                                                    <td><?= $row['first_name'] ?> <?= $row['last_name'] ?></td>
                                                    <td><?= $row['date'] ?></td>
                                                    <td><?php echo $date_start->format('h:i A ') ?> to <?php echo $date_end->format('h:i A ') ?></td>
                                                    <td><?= $row['fees'] ?> Taka</td>

                                                    <?php if ($row['status'] == 2) {
                                                    ?>
                                                        <td colspan="2">
                                                            <p class="text-warning">Reschedule</p>
                                                        </td>
                                                    <?php
                                                    } elseif ($row['status'] == 1) {
                                                    ?>
                                                        <td>
                                                            <p class="text-success">Finish</p>
                                                        </td>
                                                        <td><a target="_blank" title="My Prescriptions" href="prescription_print.php?appoinment_book_id=<?= $row['appoinment_book_id'] ?>" class="btn btn-sm btn-outline-warning btn-block" href=""><i class="fa fa-print" aria-hidden="true"></i></a></td>
                                                    <?php
                                                    } elseif ($row['status'] == 0) {
                                                    ?>
                                                        <td colspan="2">
                                                            <p class="text-info">Created</p>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
<?php } else {
    header("Location: index.php");
} ?>

</html>