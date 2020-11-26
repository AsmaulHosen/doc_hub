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
            $medicine_id = $_GET['medicine_id'];
            $sql_vendor = "SELECT * FROM users,vendor_details WHERE users.user_id = vendor_details.user_id AND users.user_id = $user_id;";

            $result_vendor = $con->query($sql_vendor);

            foreach ($result_vendor as $row) {
                $vendor_id  = $row['vendor_id'];
            }
            $sql = "SELECT * FROM medicine_details WHERE medicine_id = $medicine_id;";
            $result = $con->query($sql);
            foreach ($result as $row) {
                $medicine_name  = $row['medicine_name'];
                $categories_medication  = $row['categories_medication'];
                $categories_drug  = $row['categories_drug'];
                $type  = $row['type'];
                $unit_price  = $row['unit_price'];
                $sell_price  = $row['sell_price'];
                $age  = $row['age'];
                $qty  = $row['qty'];
            }
            ?>
            <section class="contact-us section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Contact Form -->
                            <div class="contact-form-area m-top-30">
                                <h4>Medicine Details</h4>
                                <form class="form" method="post" action="vendor/update_medicine.php">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
                                            <input type="hidden" name="medicine_id" value="<?php echo $medicine_id; ?>">
                                            <div class="form-group">
                                                <input type="text" name="medicine_name" placeholder="Medicine Name" value="<?php echo $medicine_name ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="categories_medication" id="categories_medication" class="form-control" required>
                                                    <option value="">Select Categories of Medication</option>
                                                    <option value="0" <?php if ($categories_medication == "0") echo 'selected="selected"'; ?>>General Sales</option>
                                                    <option value="1" <?php if ($categories_medication == "1") echo 'selected="selected"'; ?>>Pharmacy Medicines</option>
                                                    <option value="2" <?php if ($categories_medication == "2") echo 'selected="selected"'; ?>>Prescription Only Medicines</option>
                                                    <option value="3" <?php if ($categories_medication == "3") echo 'selected="selected"'; ?>>Controlled Drugs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="categories_drug" id="categories_drug" class="form-control" required>
                                                    <option value="">Select Drug Categories</option>
                                                    <option value="0" <?php if ($categories_drug == "0") echo 'selected="selected"'; ?>>CNS depressants</option>
                                                    <option value="1" <?php if ($categories_drug == "1") echo 'selected="selected"'; ?>>CNS Stimulants</option>
                                                    <option value="2" <?php if ($categories_drug == "2") echo 'selected="selected"'; ?>>Hallucinogens</option>
                                                    <option value="3" <?php if ($categories_drug == "3") echo 'selected="selected"'; ?>>Dissociative Anesthetics</option>
                                                    <option value="4" <?php if ($categories_drug == "4") echo 'selected="selected"'; ?>>Narcotic Analgesics </option>
                                                    <option value="5" <?php if ($categories_drug == "5") echo 'selected="selected"'; ?>>Inhalants </option>
                                                    <option value="6" <?php if ($categories_drug == "6") echo 'selected="selected"'; ?>>Cannabis </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="">Select Type</option>
                                                    <option value="0" <?php if ($type == "0") echo 'selected="selected"'; ?>>Liquid</option>
                                                    <option value="1" <?php if ($type == "1") echo 'selected="selected"'; ?>>Powder</option>
                                                    <option value="2" <?php if ($type == "2") echo 'selected="selected"'; ?>>Tablet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <input type="unit_price" name="unit_price" value="<?php echo $unit_price; ?>" placeholder="Unit Price" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <input type="sell_price" name="sell_price" value="<?php echo $sell_price ?>" placeholder="Selling Price" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select name="age" id="age" class="form-control" required>
                                                    <option value="">Select Age</option>
                                                    <option value="0" <?php if ($age == "0") echo 'selected="selected"'; ?>>Below 10 Years</option>
                                                    <option value="1" <?php if ($age == "1") echo 'selected="selected"'; ?>>10 to 15 Years</option>
                                                    <option value="2" <?php if ($age == "2") echo 'selected="selected"'; ?>>15 to 20 Years</option>
                                                    <option value="3" <?php if ($age == "3") echo 'selected="selected"'; ?>>20 to 35 Years</option>
                                                    <option value="4" <?php if ($age == "4") echo 'selected="selected"'; ?>>Over 35 years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <input type="number" name="qty" placeholder="Total Qty" value="<?php echo $qty; ?>" required>
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
                            <!--/ End contact Form -->
                        </div>
                    </div>
                </div>
            </section>
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