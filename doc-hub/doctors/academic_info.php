<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Education History Add Successfully ",
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
                    title: "Same Institute Name Already exist !!!",
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
    $institute_name = $_POST['institute_name'];
    $degree = $_POST['degree'];
    $passing_year = $_POST['year'];

    include_once '../database/dbCon.php';
    $con = connect();
    $check = "SELECT * FROM education_history WHERE doctors_id = '$doctors_id' and institute_name = '$institute_name'";
    $rs = mysqli_query($con, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if (isset($data)) {
        echo "<script type= 'text/javascript'>MyCheckFn();</script>";
    } else {
        $sql = "INSERT INTO education_history(doctors_id,institute_name,degree,year) VALUES ('$doctors_id','$institute_name','$degree','$passing_year');";
        if ($con->query($sql) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    }
}
