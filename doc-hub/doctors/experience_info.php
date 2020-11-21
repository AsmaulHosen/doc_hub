<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Experience History Add Successfully ",
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

        function MyCheckFn() {
            swal({
                    title: "Same Hospital Name & Duration Already exist !!!",
                    text: " ",
                    type: "warning",
                    timer: 6000,
                    showConfirmButton: true,
                },
                window.load = function() {
                    window.location = '../doctor_dashboard.php';
                });
        }
    </script>

</header>
<?php
if ($_POST) {

    $doctors_id = $_POST['doctors_id'];
    $hospital_name = $_POST['hospital_name'];
    $position_name = $_POST['position_name'];
    $department_name = $_POST['department_name'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];

    include_once '../database/dbCon.php';
    $con = connect();
    $check = "SELECT * FROM experienced WHERE hospital_name = '$hospital_name' and doctors_id = '$doctors_id' and position_name = '$position_name'";
    $rs = mysqli_query($con, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if (isset($data)) {
        echo "<script type= 'text/javascript'>MyCheckFn();</script>";
    } else {
        $sql = "INSERT INTO experienced(doctors_id,hospital_name,position_name,department_name,start_year,end_year) 
        VALUES ('$doctors_id','$hospital_name','$position_name','$department_name','$start_year','$end_year');";
        if ($con->query($sql) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    }
}
