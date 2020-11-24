<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Doctor's Hub | My Prescription</title>
    <link rel="icon" type="image/favicon.png" href="img/logo.png">

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            /* font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; */
            color: #555;
            border: 1px solid #2e2751;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
            
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #2e2751;
            color: azure;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<?php
$appoinment_book_id = $_GET['appoinment_book_id'];
include_once 'database/dbCon.php';
$con = connect();
$sql_patint = "SELECT appointment_book.*,users.first_name,users.last_name,patient_details.gender,patient_details.contact_number,users.email 
    FROM appointment_book,patient_details ,users
        WHERE appointment_book.patient_id = patient_details.patient_id AND patient_details.user_id = users.user_id
        AND appointment_book.appoinment_book_id = '$appoinment_book_id' ";
$result_patient = $con->query($sql_patint);
foreach ($result_patient as $row) {
    $patient_first_name  = $row['first_name'];
    $patient_last_name  = $row['last_name'];
    $patient_gender  = $row['gender'];
    $patient_contact_no  = $row['contact_number'];
    $patient_email  = $row['email'];
}

$sql_doc = "SELECT appointment_book.*,users.first_name,users.last_name,doctors_deatils.gender,doctors_deatils.contact_number,users.email 
    FROM appointment_book,doctors_deatils ,users
        WHERE appointment_book.doctors_id = doctors_deatils.doctors_id AND doctors_deatils.user_id = users.user_id
        AND appointment_book.appoinment_book_id = '$appoinment_book_id' ";
$result_doc = $con->query($sql_doc);
foreach ($result_doc as $row) {
    $doc_first_name  = $row['first_name'];
    $doc_last_name  = $row['last_name'];
    $doc_contact_no  = $row['contact_number'];
    $doc_email  = $row['email'];
}

$sql_prescription = "SELECT * FROM `prescription_details` WHERE appoinment_book_id = '$appoinment_book_id' ";
$result_pres = $con->query($sql_prescription);
foreach ($result_pres as $row) {
    $start_time  = $row['start_time'];
    $end_time  = $row['end_time'];
    $date  = $row['date'];
    $prescription_desc  = $row['prescription_desc'];
    $special_note  = $row['special_note'];
}
$date_start = new DateTime($row['start_time']);
$date_end = new DateTime($row['end_time']);
?>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/logo.png" style="width:100%; max-width:200px;">
                            </td>

                            <td>
                                Appointment Number :<?php echo $appoinment_book_id; ?><br>
                                Appointment Time: <?php echo $date_start->format('h:i A ') ?> to <?php echo $date_end->format('h:i A ') ?><br>
                                Dtae: <?php echo $date; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>Doctor's Information</strong>
                                <hr>
                                <?php echo $doc_first_name; ?> <?php echo $doc_last_name; ?><br>
                                <?php echo $doc_contact_no; ?><br>
                                <?php echo $doc_email; ?>
                            </td>

                            <td>
                                <strong>Your Information</strong>
                                <hr>
                                <?php echo $patient_first_name; ?> <?php echo $patient_last_name; ?><br>
                                <?php echo $patient_contact_no; ?><br>
                                <?php echo $patient_email; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading" style="background-color:antiquewhite;">
                <td>
                    Prescription Details
                </td>

                <td>
                    Special Note
                </td>
            </tr>

            <tr class="details">
                <td>
                    <?php echo htmlspecialchars_decode($prescription_desc); ?>
                </td>

                <td>
                    <?php echo $special_note; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>