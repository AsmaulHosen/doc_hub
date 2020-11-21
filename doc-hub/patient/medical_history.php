<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</head>
<header>
    <script>
        function MySuccessFn() {
            swal({
                    title: "Medical History Add Successfully ",
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

        function MyFileCheckFn() {
            swal({
                    title: "File is not an image.",
                    text: "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
                    type: "warning",
                    timer: 3000,
                    showConfirmButton: false,
                },
                window.load = function() {
                    window.location = '../patient_dashboard.php';
                });
        }

        function MyFileCheckStatusFn() {
            swal({
                    title: "File is too big",
                    text: "Sorry, only JPG, JPEG, PNG & GIF files are allowed & less than 5MB",
                    type: "warning",
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
    // Start of code to upload file
    $target_dir = "../img/patient/medical_history/";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    // echo $fileName;
    // exit;
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $msg = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        
    } else {
        echo "<script type= 'text/javascript'>MyFileCheckFn();</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "<script type= 'text/javascript'>MyFileCheckStatusFn();</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPG"
        && $imageFileType != "JPEG"
    ) {
        echo "<script type= 'text/javascript'>MyFileCheckFn();</script>";
        $uploadOk = 0;
    }
    // echo $imageFileType;
    // exit;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script type= 'text/javascript'>MyFileCheckFn();</script>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg = "The file " . $fileName . " has been uploaded.";
        } else {
            echo "<script type= 'text/javascript'>MyFileCheckFn();</script>";
        }
    }
    // =========End of file upload======



    if ($uploadOk == 1) {
        $patient_id = $_POST['patient_id'];
        $medical_desc = $_POST['medical_desc'];

        include_once '../database/dbCon.php';
        $con = connect();

        $sql = "INSERT INTO medical_report_history(patient_id,medical_desc,image) VALUES ('$patient_id','$medical_desc','$fileName');";
        if ($con->query($sql) === TRUE) {
            echo "<script type= 'text/javascript'>MySuccessFn();</script>";
        } else {
            echo "<script type= 'text/javascript'>MyWarningFn();</script>";
        }
    }
}
