<?php
session_start();
include("admin/config/dbcon.php");

if (isset($_POST["register_btn"])) {
    $tc = mysqli_real_escape_string($con, $_POST["tc"]);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);
    $adres = mysqli_real_escape_string($con, $_POST["adres"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $blood_type = mysqli_real_escape_string($con, $_POST["blood_type"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $date = mysqli_real_escape_string($con, $_POST["date"]);

    if ($password == $cpassword) {
        // check tc
        $checktc = "SELECT TC FROM patient WHERE TC='$tc'";
        $checktc_run = mysqli_query($con, $checktc);
        if (mysqli_num_rows($checktc_run) > 0) {
            //Already TC Exists
            $_SESSION["message"] = "You Have Already Account. Please Sign In..";
            header("Location: register.php");
            exit(0);
        } else {
           // Doğum tarihi değerini al
            //$dogum_tarihi = $_POST['dogum_tarihi'];

            // Bugünün tarihini al
            $bugunun_tarihi = date("Y-m-d");

            // Doğum tarihini ve bugünün tarihini DateTime objelerine dönüştür
            $dogum = new DateTime($date);
            $bugun = new DateTime($bugunun_tarihi);

            // Yaşı hesapla
            $age = $dogum->diff($bugun)->y;

            $user_query = "INSERT INTO patient (TC, fname, lname, email, password, address, phone, gender, birth_date, age, blood_group, status) 
                                    VALUES ('$tc','$fname','$lname','$email','$password','$adres','$phone','$gender','$date','$age','$blood_type','1')";
            $user_query_run = mysqli_query($con, $user_query);

            if ($user_query_run) {
                $_SESSION["message"] = "Registered Successfully";
                //$_SESSION["message"] = gettype($age);
                header("Location: patient_login.php");
                exit(0);
            } else {
                $_SESSION["message"] = "Something went wrong";
                header("Location: register.php");
                exit(0);
            }
        }

    } else {
        $_SESSION["message"] = "Password and confirm password does not match";
        header("Location: register.php");
        exit(0);
    }

} 


if (isset($_POST["dogum_tarihi"])) {
    $date = mysqli_real_escape_string($con, $_POST["date"]);

    // Doğum tarihi değerini al
    //$dogum_tarihi = $_POST['dogum_tarihi'];

    // Bugünün tarihini al
    $bugunun_tarihi = date("Y-m-d");

    // Doğum tarihini ve bugünün tarihini DateTime objelerine dönüştür
    $dogum = new DateTime($date);
    $bugun = new DateTime($bugunun_tarihi);

    // Yaşı hesapla
    $age = $dogum->diff($bugun)->y;
    echo "Yaş: " . $age;
    echo "Yaş: " . gettype($age);
    


}

else {
    header("Location: register.php");
    exit(0);
}
?>