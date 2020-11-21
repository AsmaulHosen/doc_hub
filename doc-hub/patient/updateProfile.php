<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Profile Update successfully",
                    text: "",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../patient_dashboard.php';
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
                    window.location = '../patient_dashboard.php';
                });
        }
    </script>

</header>
<?php
if ($_POST) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $patient_id   = $_POST['patient_id'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    $date_of_birth = $_POST['date_of_birth'];
    $wrok_desc = $_POST['wrok_desc'];
    $religion = $_POST['religion'];
    $height  = $_POST['height'];
    $weight = $_POST['weight'];
    $blood_grp = $_POST['blood_grp'];
    $high_pressure = $_POST['high_pressure'];
    $blood_sugar = $_POST['blood_sugar'];
    $contact_number = $_POST['contact_number'];

    include_once '../database/dbCon.php';
    $con = connect();
    $sql = "UPDATE users SET first_name='$first_name',last_name='$last_name' WHERE user_id=$user_id";
    if ($con->query($sql) === TRUE) {
        $sql2 = "UPDATE patient_details SET gender='$gender', contact_number='$contact_number', date_of_birth='$date_of_birth', wrok_desc='$wrok_desc', religion='$religion', height='$height', weight='$weight', blood_grp='$blood_grp', high_pressure='$high_pressure', blood_sugar='$blood_sugar', about='$about' WHERE patient_id =$patient_id ";
        if ($con->query($sql2) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    } else {
        echo "<script type= 'text/javascript'>MyWarningFn();</script>";
    }
}
