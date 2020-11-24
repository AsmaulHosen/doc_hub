<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Presciption Create successfully",
                    text: "",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../my_appoinment_list.php';
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
                    window.location = '../my_appoinment_list.php';
                });
        }
    </script>

</header>
<?php
include_once '../database/dbCon.php';
$con = connect();
if ($_POST) {
    $prescription_desc = htmlspecialchars($_POST['desc']);
    $patient_id = $_POST['patient_id'];
    $doctors_id = $_POST['doctors_id'];
    $appoinment_book_id = $_POST['appoinment_book_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $special_note = $_POST['special_note'];

    $sql = "INSERT INTO `prescription_details` (`patient_id`, `doctors_id`, `appoinment_book_id`, `start_time`, `end_time`, `prescription_desc`, `special_note`) 
    VALUES ('$patient_id', '$doctors_id', '$appoinment_book_id', '$start_time', '$end_time', '$prescription_desc', '$special_note')";
    if ($con->query($sql) === TRUE) {
        $sql2 = "UPDATE appointment_book SET status='1' WHERE appoinment_book_id ='$appoinment_book_id'";
       
        if ($con->query($sql2) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MynWarningFn();</script>";
        }
    } else {
        echo "<script type= 'text/javascript'>MyWarningFn();</script>";
    }
}
