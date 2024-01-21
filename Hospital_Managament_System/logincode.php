<?php
session_start();
include("admin/config/dbcon.php");

// hasta logini
if (isset($_POST["login_btn"])) {
    $tc = mysqli_real_escape_string($con, $_POST["tc"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $login_query = "SELECT * FROM patient WHERE TC = '$tc ' and password = '$password' LIMIT 1 ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        foreach ($login_query_run as $data) {
            $Patient_ID = $data['patient_id'];
            $user_name = $data['fname'].' '.$data['lname'];
            $TC = $data['TC'];
            $status = $data['status'];

        }
        $_SESSION["auth"] = true;
        $_SESSION["status"] = "$status";
        $_SESSION["auth_user"] = [
            'patient_id' => $Patient_ID,
            'user_name' => $user_name,
            'TC' => $TC,
        ];

        if ($_SESSION['status'] == '1') { // hasta aktifse
            header("Location: admin/index_patients.php");
            exit(0);
        } 
    } else {
        $_SESSION["message"] = "Invalid E-mail or password. Please try again.";
        header("Location: patient_login.php");
        exit(0);
    }

// doktor ve personel girişi
}else if (isset($_POST["login_btn_personel"])) {
    $sicil = mysqli_real_escape_string($con, $_POST["sicil"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $login_query_personel = "SELECT * FROM personel WHERE sicil = '$sicil ' and password = '$password' LIMIT 1 ";
    $login_query_run_personel = mysqli_query($con, $login_query_personel);
    $login_query_doctor = "SELECT * FROM doctor WHERE sicil = '$sicil ' and password = '$password' LIMIT 1 ";
    $login_query_run_doctor = mysqli_query($con, $login_query_doctor);

    if (mysqli_num_rows($login_query_run_personel) > 0) { // eğer personel tablosunda kayıt gelirse
        foreach ($login_query_run_personel as $data_p) {
            $email = $data_p['email'];
            $sicil = $data_p['sicil'];
            $user_name = $data_p['fname'].' '.$data_p['lname'];
            $password = $data_p['password'];
            $status = $data_p['status'];
        }
        $_SESSION["auth"] = true;
        $_SESSION["status"] = "$status";
        $_SESSION["auth_user"] = [
            'sicil' => $sicil,
            'user_name' => $user_name,
        ];

        if ($_SESSION['status'] == '1') { // personel aktifse
            header("Location: admin/index_technical.php");
            exit(0);
        } 
        else { // personel aktif değilse
            $_SESSION["message"] = "Personel Is Not Active.";
            header("Location: ../index.php");
            exit(0);
        } 
    } else { // personel tablosunda bulamazsan doktor tablosunda ara
        if (mysqli_num_rows($login_query_run_doctor) > 0) { // eğer personel tablosunda kayıt gelirse
            foreach ($login_query_run_doctor as $data) {
                $email = $data['email'];
                $id = $data['doctor_id'];
                $sicil = $data['sicil'];
                $user_name = $data['fname'].' '.$data['lname'];
                $password = $data['password'];
                $status = $data['status'];
            }
            $_SESSION["auth"] = true;
            $_SESSION["status"] = "$status";
            $_SESSION["doctor_id"] = "$id";
            $_SESSION["auth_user"] = [
                'sicil' => $sicil,
                'user_name' => $user_name
            ];
    
            if ($_SESSION['status'] == '1') { // doktor aktifse
                header("Location: admin/index_doctors.php");
                exit(0);
            } 
            else { // personel aktif değilse
                $_SESSION["message"] = "Doctor Is Not Active.";
                header("Location: ../index.php");
                exit(0);
            } 
    }
    }
    
}


?>

