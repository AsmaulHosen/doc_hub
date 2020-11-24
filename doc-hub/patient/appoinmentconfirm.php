<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Doctor Appointment Book successfully",
                    text: "",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../my_appoinment.php';
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
                    window.location = '../index.php';
                });
        }

        function MyCheckFn() {
            swal({
                    title: "Already Book this Doctors Appoinment",
                    text: "Invalid Attempt",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../index.php';
                });
        }
    </script>

</header>
<?php
include_once '../database/dbCon.php';
$con = connect();
if ($_POST) {
    $appoinment_book_id  = $_POST['appointment_id'];
    $patient_id = $_POST['patient_id'];
    $doctors_id = $_POST['doctors_id'];
    $date = $_POST['date'];
    $start_time  = $_POST['start_time'];
    $end_time  = $_POST['end_time'];
    $fees = $_POST['fees'];
    $payment_method  = $_POST['payment_method'];
    $paymeny_desc  = $_POST['paymeny_desc'];

    $checksql = "SELECT * FROM `appointment_book` WHERE date = '$date' AND start_time  = '$start_time'";
    $checkres = mysqli_query($con, $checksql);
    $checkdata = mysqli_fetch_array($checkres, MYSQLI_NUM);

    if ($checkres->num_rows > 0) {
        echo "<script type= 'text/javascript'>MyCheckFn();</script>";
    } else {
        $sql = "INSERT INTO `appointment_book` ( `appoinment_book_id`, `patient_id`, `doctors_id`, `date`, `start_time`, `end_time`, `fees`,`payment_method`,`paymeny_desc`) 
        VALUES ('$appoinment_book_id', '$patient_id', '$doctors_id', '$date', '$start_time', '$end_time', '$fees', '$payment_method', '$paymeny_desc');";

        if ($con->query($sql) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    }
}


?>