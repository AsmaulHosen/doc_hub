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
                    type: "error",
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
    $present_address = $_POST['present_address'];
    $perrmanent_address = $_POST['perrmanent_address'];

    include_once '../database/dbCon.php';
    $con = connect();
    $sql = "UPDATE users SET first_name='$first_name',last_name='$last_name' WHERE user_id=$user_id";
    if ($con->query($sql) === TRUE) {
        $image = 0;
        if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != '') {
            $target_dir = "../img/patient/";
            $image = date('YmdHis_');
            $image .= basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            if ($_FILES["image"]["size"] > 5000000) {
                $uploadOk = 0;
            }
            if (
                $imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPEG"
            ) {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $okFlag = FALSE;
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                } else {
                    $okFlag = FALSE;
                }
            }
            $sql_img = "UPDATE patient_details SET image='$image' WHERE patient_id =$patient_id ";
            $con->query($sql_img);
            // echo $sql_img;exit;
        }
        $sql2 = "UPDATE patient_details SET gender='$gender', contact_number='$contact_number', date_of_birth='$date_of_birth', wrok_desc='$wrok_desc', religion='$religion', height='$height', weight='$weight', blood_grp='$blood_grp', high_pressure='$high_pressure', blood_sugar='$blood_sugar', about='$about', present_address='$present_address', perrmanent_address='$perrmanent_address' WHERE patient_id =$patient_id ";
        if ($con->query($sql2) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    } else {
        echo "<script type= 'text/javascript'>MyWarningFn();</script>";
    }
}
