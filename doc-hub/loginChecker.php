<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
</head>
<header>
    <script>
        function MyPatientSuccessFn() {
            swal({
                    title: "Patient Login Successfully",
                    text: "",
                    type: "success",
                    timer: 1900,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = 'index.php';
                });
        }

        function MyDoctorSuccessFn() {
            swal({
                    title: "Doctor Login Successfully",
                    text: "",
                    type: "success",
                    timer: 1900,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = 'doctor_dashboard.php';
                });
        }

        function MyVendorSuccessFn() {
            swal({
                    title: "Vendor Login Successfully",
                    text: "",
                    type: "success",
                    timer: 1900,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = 'vendor_dashboard.php';
                });
        }

        function MyWarningFn() {
            swal({
                    title: "Invalid Attemt",
                    text: "",
                    type: "error",
                    timer: 1900,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = 'login.php';
                });
        }
    </script>
</header>

<?php
include_once 'database/dbCon.php';
$con = connect();
//Login checker
session_start();
if ($_POST) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        $row1 = $result->fetch_array(MYSQLI_ASSOC);

        $_SESSION['isLoggedIn'] = TRUE;
        foreach ($result as $row) {
            $_SESSION['user_id']     = $row['user_id'];
            $_SESSION['email']       = $row['email'];
            $_SESSION['user_role']   = $row['user_role'];
        }
        
        if ($_SESSION['user_role'] == 1) {
            echo "<script type= 'text/javascript'>MyPatientSuccessFn();</script>";
        } elseif ($_SESSION['user_role'] == 2) {
            echo "<script type= 'text/javascript'>MyDoctorSuccessFn();</script>";
        } elseif ($_SESSION['user_role'] == 3) {
            echo "<script type= 'text/javascript'>MyVendorSuccessFn();</script>";
        }
    } else {
        // session_unset();
        echo "<script type= 'text/javascript'>MyWarningFn();</script>";
    }
}
?>