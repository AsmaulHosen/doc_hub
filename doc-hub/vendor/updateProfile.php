<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Vendor Profile Update successfully",
                    text: "",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../vendor_dashboard.php';
                });
        }

        function MyWarningFn() {
            swal({
                    title: "Sorry User !! Something went wrong, Please try again later.",
                    text: "Invalid Attempt",
                    type: "danger",
                    timer: 3000,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../vendor_dashboard.php';
                });
        }
    </script>

</header>
<?php
if ($_POST) {

    $user_id = $_POST['user_id'];
    $vendor_id = $_POST['vendor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];
    $vendor_name = $_POST['vendor_name'];
    $address = $_POST['address'];

    include_once '../database/dbCon.php';
    $con = connect();
    $sql = "UPDATE users SET first_name='$first_name',last_name='$last_name' WHERE user_id=$user_id";
    if ($con->query($sql) === TRUE) {
        $sql2 = "UPDATE vendor_details SET vendor_name='$vendor_name',address='$address',phone_no='$phone_no' WHERE vendor_id =$vendor_id ";
        if ($con->query($sql2) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    } else {
        echo "<script type= 'text/javascript'>MyWarningFn();</script>";
    }
}
