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
                    window.location = '../patient_booking.php';
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
                    type: "danger",
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

if ($_POST) {
    $appointment_id = $_POST['appointment_id'];
    echo $appointment_id;exit;

}


// session_start();
// $appointment_id = $_GET['appointment_id'];
// function generateRandomString()
// {
//     $characters = '0123456789';
//     $length = 4;
//     $charactersLength = strlen($characters);
//     $randomString = 'DH-APN-';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }
// $appointment_number = generateRandomString();
// $user_id = $_SESSION['user_id'];
// echo $appointment_id;
// echo "<br>";
// echo $appointment_number;
// echo "<br>";
// echo $user_id;
// exit;
?>