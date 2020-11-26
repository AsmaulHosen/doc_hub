<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Medicine Details Update successfully",
                    text: "",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../my_store.php';
                });
        }

        function MyWarningFn() {
            swal({
                    title: "Sorry User !! Something went wrong, Please try again later.",
                    text: "Invalid Attempt",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../my_store.php';
                });
        }

        function MyCheckFn() {
            swal({
                    title: "Same Medicine Name Already exist !!!",
                    text: " ",
                    type: "warning",
                    timer: 6000,
                    showConfirmButton: true,
                },
                window.load = function() {
                    window.location = '../my_store.php';
                });
        }

        function MyCheckPriceFn() {
            swal({
                    title: "Unit Price Must be Lower Than Selling Price",
                    text: "Check Pls",
                    type: "warning",
                    timer: 6000,
                    showConfirmButton: true,
                },
                window.load = function() {
                    window.location = '../my_store.php';
                });
        }
    </script>

</header>
<?php
include_once '../database/dbCon.php';
$con = connect();

if ($_POST) {
    $medicine_name = $_POST['medicine_name'];
    $medicine_id = $_POST['medicine_id'];
    $categories_medication = $_POST['categories_medication'];
    $categories_drug = $_POST['categories_drug'];
    $type = $_POST['type'];
    $unit_price = $_POST['unit_price'];
    $sell_price = $_POST['sell_price'];
    $age = $_POST['age'];
    $qty = $_POST['qty'];
    $vendor_id = $_POST['vendor_id'];


    if (number_format($unit_price) >= number_format($sell_price)) {
        echo "<script type= 'text/javascript'>MyCheckPriceFn();</script>";
    } else {
        $check = "SELECT * FROM medicine_details WHERE vendor_id = '$vendor_id' and medicine_name = '$medicine_name' AND medicine_id != '$medicine_id'";
        $rs = mysqli_query($con, $check);
        $rs = mysqli_query($con, $check);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
        if (isset($data)) {
            echo "<script type= 'text/javascript'>MyCheckFn();</script>";
        } else {
            $sql = "UPDATE `medicine_details` SET
             `medicine_name`='$medicine_name',`categories_medication`='$categories_medication',`categories_drug`='$categories_drug',
             `type`='$type',`unit_price`='$unit_price',`sell_price`='$sell_price',`age`='$age',`qty`='$qty',`vendor_id`='$vendor_id'
              WHERE medicine_id = '$medicine_id'";
            if ($con->query($sql) === TRUE) {
                echo "<script type= 'text/javascript'>MySuccessFn();</script>";
            } else {
                echo "<script type= 'text/javascript'>MyWarningFn();</script>";
            }
        }
    }
}
