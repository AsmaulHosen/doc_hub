<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
<?php include_once 'includes/head.php'; ?>
<!--/ End Head -->

<head>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</head>
<?php
if (!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false) {
    header("Location: index.php");
}
if ($_SESSION['user_role'] == 3) {
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
            include_once 'database/dbCon.php';
            $con = connect();
            $sql = "SELECT * FROM prescription_details,patient_details,users 
        WHERE prescription_details.patient_id = patient_details.patient_id 
        AND patient_details.user_id = users.user_id ";
            $result = $con->query($sql);

            ?>
            <section class="features-area section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="container">
                                <div class="section-top">
                                    <h1><span>Patient Prescription List</span></h1>
                                </div>
                                <hr>

                                <div class="table-responsive">

                                    <table class="table table-bordered table-hover dt-responsive">
                                        <thead>
                                            <tr>
                                                <th>Appoinment No</th>
                                                <th>Patient Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result as $row) {
                                            ?>
                                                <tr>
                                                    <td><?= $row['appoinment_book_id'] ?></td>
                                                    <td><?= $row['first_name'] ?> <?= $row['last_name'] ?></td>
                                                    <td><?= $row['date'] ?></td>
                                                    <td><a target="_blank" title="View Prescriptions" href="prescription_print.php?appoinment_book_id=<?= $row['appoinment_book_id'] ?>" class="btn btn-sm btn-outline-warning " href=""><i class="fa fa-eye" aria-hidden="true"></i> View Prescription</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <script>
            $('table').DataTable();
        </script>
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