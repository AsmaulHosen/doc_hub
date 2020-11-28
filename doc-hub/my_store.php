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
            $user_id = $_SESSION['user_id'];
            $sql_vendor = "SELECT * FROM users,vendor_details WHERE users.user_id = vendor_details.user_id AND users.user_id = $user_id;";

            $result_vendor = $con->query($sql_vendor);

            foreach ($result_vendor as $row) {
                $vendor_id  = $row['vendor_id'];
            }
            $sql = "SELECT * FROM medicine_details WHERE vendor_id = $vendor_id;";
            $result = $con->query($sql);
            ?>
            <section class="contact-us section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Contact Form -->
                            <div class="contact-form-area m-top-30">
                                <h4>Medicine Details</h4>
                                <form class="form" method="post" action="vendor/add_medicine.php">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
                                            <div class="form-group">
                                                <input type="text" name="medicine_name" placeholder="Medicine Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="categories_medication" id="categories_medication" class="form-control" required>
                                                    <option value="">Select Categories of Medication</option>
                                                    <option value="0">General Sales</option>
                                                    <option value="1">Pharmacy Medicines</option>
                                                    <option value="2">Prescription Only Medicines</option>
                                                    <option value="3">Controlled Drugs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="categories_drug" id="categories_drug" class="form-control" required>
                                                    <option value="">Select Drug Categories</option>
                                                    <option value="0">CNS depressants</option>
                                                    <option value="1">CNS Stimulants</option>
                                                    <option value="2">Hallucinogens</option>
                                                    <option value="3">Dissociative Anesthetics</option>
                                                    <option value="4">Narcotic Analgesics </option>
                                                    <option value="5">Inhalants </option>
                                                    <option value="6">Cannabis </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="">Select Type</option>
                                                    <option value="0">Liquid</option>
                                                    <option value="1">Powder</option>
                                                    <option value="2">Tablet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <input type="unit_price" name="unit_price" placeholder="Unit Price" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <input type="sell_price" name="sell_price" placeholder="Selling Price" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="age" id="age" class="form-control" required>
                                                    <option value="">Select Age</option>
                                                    <option value="0">Below 10 Years</option>
                                                    <option value="1">10 to 15 Years</option>
                                                    <option value="2">15 to 20 Years</option>
                                                    <option value="3">20 to 35 Years</option>
                                                    <option value="4">Over 35 years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <input type="number" name="qty" placeholder="Total Qty" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="bizwheel-btn theme-2">Save</button>
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
            <section class="features-area section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="container">
                                <div class="section-top">
                                    <h1><span>All Medicine List</span></h1>
                                </div>
                                <hr>

                                <div class="table-responsive">

                                    <table class="table table-bordered table-hover dt-responsive">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Categories of Medicine</th>
                                                <th>Drug Categories</th>
                                                <th>Drug Type</th>
                                                <th>Unit Price</th>
                                                <th>Selling Price</th>
                                                <th>Age Limit</th>
                                                <th>Quantity</th>
                                                <th>Total </th>
                                                <th>Profit <small>(From Selling)</small> </th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result as $row) {
                                            ?>
                                                <tr>
                                                    <td><?= $row['medicine_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['categories_medication'] == 0) {
                                                            echo "General Sales";
                                                        } elseif ($row['categories_medication'] == 1) {
                                                            echo "Pharmacy Medicines";
                                                        } elseif ($row['categories_medication'] == 2) {
                                                            echo "Prescription Only Medicines";
                                                        } elseif ($row['categories_medication'] == 3) {
                                                            echo "Controlled Drugs ";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['categories_drug'] == 0) {
                                                            echo "CNS depressants";
                                                        } elseif ($row['categories_drug'] == 1) {
                                                            echo "CNS Stimulants";
                                                        } elseif ($row['categories_drug'] == 2) {
                                                            echo "Hallucinogens";
                                                        } elseif ($row['categories_drug'] == 3) {
                                                            echo "Dissociative Anesthetics";
                                                        } elseif ($row['categories_drug'] == 4) {
                                                            echo "Narcotic Analgesics";
                                                        } elseif ($row['categories_drug'] == 5) {
                                                            echo "Inhalants";
                                                        } elseif ($row['categories_drug'] == 6) {
                                                            echo "Cannabis";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row['type'] == 0) {
                                                            echo "Liquid";
                                                        } elseif ($row['type'] == 1) {
                                                            echo "Powder";
                                                        } elseif ($row['type'] == 2) {
                                                            echo "Tablet";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $row['unit_price'] ?> ৳</td>
                                                    <td><?= $row['sell_price'] ?> ৳</td>
                                                    <td>
                                                        <?php
                                                        if ($row['age'] == 0) {
                                                            echo "Below 10 Years";
                                                        } elseif ($row['age'] == 1) {
                                                            echo "10 to 15 Years";
                                                        } elseif ($row['age'] == 2) {
                                                            echo "15 to 20 Years";
                                                        } elseif ($row['age'] == 3) {
                                                            echo "20 to 35 Years";
                                                        } elseif ($row['age'] == 4) {
                                                            echo "Over 35 years";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $row['qty'] ?></td>
                                                    <td><?= $row['unit_price'] * $row['qty'] ?>.00 ৳</td>
                                                    <td><?= ($row['sell_price'] * $row['qty']) - ($row['unit_price'] * $row['qty']) ?>.00 ৳</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-outline-warning " href="edit_medicine.php?medicine_id=<?= $row['medicine_id'] ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                   
                                                        <a class="btn btn-sm btn-outline-danger " href="vendor/deletemedicine.php?medicine_id=<?= $row['medicine_id'] ?>"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
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