<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Specialities delete successfully",
                    text: "",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../doctor_dashboard.php';
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
                    window.location = '../doctor_dashboard.php';
                });
        }
    </script>
</header>
<?php

ob_start();
include_once '../database/dbCon.php';
$con = connect();

if (isset($_GET['speciality_id']) != "") {
    $delete = $_GET['speciality_id'];
    $delete = $con->query("DELETE FROM speciality WHERE speciality_id='$delete'");
    if ($delete) {
        echo "<script type= 'text/javascript'>MySuccessFn();</script>";
    } else {
        echo "<script type= 'text/javascript'>MyWarningFn();</script>";
    }
}
ob_end_flush();

?>