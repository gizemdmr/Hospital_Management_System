<?php
session_start();
include("config/dbcon.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$department_id = $_POST['department'];
//$status = $_POST['status'];
$password = $_POST['password'];
$address = $_POST['adres'];
$sicil = $_POST['sicil'];


$status = $_POST['status'] == true ? '1' : '0';

// doktor ekleme (başarılı)
if (isset($_POST["add_doctor"])) {
    $query = "INSERT INTO doctor (sicil, fname, lname, email, password, address, phone, department_id, status)
                        VALUES ('$sicil','$fname','$lname','$email','$password','$address','$telephone','$department_id','$status')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'Added Successfully';
        header("Location: view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: view_register.php");
        exit(0);
    }
}

// hemşire ekleme (başarılı)
if (isset($_POST["add_nurse"])) {
    $query = "INSERT INTO nurse (fname, lname, email, password, address, phone, department_id, status)
                        VALUES ('$fname','$lname','$email','$password','$address','$telephone','$department_id','$status')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'Added Successfully';
        header("Location: view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: view_register.php");
        exit(0);
    }
}

// personel ekleme (başarılı)
if (isset($_POST["add_personel"])) {
    $query = "INSERT INTO personel (sicil, fname, lname, email, password, status)
                        VALUES ('$sicil','$fname','$lname','$email','$password','$status')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'Added Successfully';
        header("Location: view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: view_register.php");
        exit(0);
    }
}

// doktor update (başarılı)
if (isset($_POST["update_doctor"])) {
    $doctor_id = $_POST['doctor_id'];
    $query = "UPDATE doctor 
    SET sicil='$sicil',
        fname='$fname', 
        lname='$lname', 
        email='$email',
        password='$password',  
        address='$address', 
        phone='$telephone', 
        department_id ='$department_id',
        status='$status'       
    WHERE doctor_id='$doctor_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = 'Updated Successfully';
        header("Location: view_register.php");
        exit(0);
    }
}

// nurse update (başarılı)
if (isset($_POST["update_nurse"])) {
    $nurse_id = $_POST['nurse_id'];
    $query = "UPDATE nurse 
    SET fname='$fname', 
        lname='$lname', 
        email='$email',
        password='$password',  
        address='$address', 
        phone='$telephone', 
        department_id ='$department_id',
        status='$status'       
    WHERE nurse_id='$nurse_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = 'Updated Successfully';
        header("Location: view_register.php");
        exit(0);
    }
}

// personel update (başarılı)
if (isset($_POST["update_personel"])) {
    $personel_id = $_POST['personel_id'];
    $query = "UPDATE personel 
    SET sicil='$sicil', 
        fname='$fname', 
        lname='$lname', 
        email='$email',
        password='$password',  
        status='$status'       
    WHERE personel_id='$personel_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = 'Updated Successfully';
        header("Location: view_register.php");
        exit(0);
    }
}
// doktor pasifleme işlemi 
if (isset($_POST["doctor_pasif"])) {
    $doctor_id = $_POST['doctor_id'];
    $query = "UPDATE doctor SET status = '0' WHERE doctor_id='$doctor_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'User Get Passive Successfully';
        header("Location: view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: view_register.php");
        exit(0);
    }
}

// nurse pasifleme işlemi 
if (isset($_POST["nurse_pasif"])) {
    $nurse_id = $_POST['nurse_id'];
    $query = "UPDATE nurse SET status = '0' WHERE nurse_id='$nurse_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'User Get Passive Successfully';
        header("Location: view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: view_register.php");
        exit(0);
    }
}

// personel pasifleme işlemi 
if (isset($_POST["personel_pasif"])) {
    $personel_id = $_POST['personel_id'];
    $query = "UPDATE personel SET status = '0' WHERE personel_id='$personel_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'User Get Passive Successfully';
        header("Location: view_register.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: view_register.php");
        exit(0);
    }
}

$medicine = $_POST['medicine_id'];
$stok = $_POST['stok'];
$Medicine_name= $_POST['name'];
$Medicine_price= $_POST['price'];
$medicine_category= $_POST['medicine_category'];

// ilaç güncelleme (başarılı)
if (isset($_POST["update_medicine"])) {
    $medicine = $_POST['medicine_id'];
    $query = "UPDATE medicine 
    SET stok='$stok',
        medicine_category_id='$medicine_category',
        price='$Medicine_price',
        name='$Medicine_name'
    WHERE medicine_id='$medicine'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = 'Updated Successfully';
        header("Location: medicine.php");
        exit(0);
    }
}

// ilaç ekleme (başarılı)
if (isset($_POST["add_medicine"])) {
    $query = "INSERT INTO medicine (name, medicine_category_id, price, stok)
            VALUES ('$Medicine_name','$medicine_category','$Medicine_price','$stok')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'Added Successfully';
        header("Location: medicine.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: medicine.php");
        exit(0);
    }
}

$gender = $_POST['gender'];
$birth = $_POST['birth_date'];
$age = $_POST['age'];
$blood = $_POST['blood'];

// hastanın kendi profil bilgilerini güncellemesi
if (isset($_POST["update_my_profile"])) {
    $deger = $_SESSION['auth_user']['TC'];
    $query = "UPDATE patient 
    SET fname='$fname', 
        lname='$lname', 
        email='$email',
        password='$password',  
        address = '$address',
        phone = '$telephone',
        gender = '$gender',
        birth_date = '$birth',
        age = '$age',
        status='$status'       
    WHERE TC='$deger'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = 'Updated Successfully';
        header("Location: view_my_profile.php");
        exit(0);
    }
}


// reçete oluşturma
if (isset($_POST["add_recete"])) {    
  
    $app_id = $_POST['app_id'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_SESSION["doctor_id"];
    $medicine_name = $_POST['medicine_name'];
    $comment = $_POST['comment'];



    $query = "INSERT INTO recete (medicine_category_id, medicine_id,patient_id,doctor_id,description,app_id, status)
                        VALUES ('$medicine_category','$medicine_name','$patient_id','$doctor_id','$comment','$app_id','0')";
     
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'Reçete Oluşturuldu';
        header("Location: my_patients_details.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: my_patients_details.php");
        exit(0);
    }
}


// randevu oluşturma
if (isset($_POST["randevu_al"])) {    
  
    $tarih = $_POST['date'];
    $patient_id = $_POST['patient_id'];
    $doctor = $_POST['doctor'];
    $saat = $_POST['saat'];

    $department = $_POST['department'];
    $query1 =  "SELECT * FROM department where name = '$department'";
    $query_run1 = mysqli_query($con, $query1);
    foreach ($query_run1 as $user) {
        if($user['name']==$department){
            $pol = $user['department_id'];
        }
    }


    $query =  "INSERT INTO appointment (app_tarih, app_saat, doctor_id, department_id, patient_id, status) 
            VALUES ('$tarih','$saat','$doctor','$pol','$patient_id','1')";
     
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = 'Randevu Oluşturuldu';
        header("Location: appointment_history.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Something Went Wrong !!';
        header("Location: appointment_history.php");
        exit(0);
    }
}
?>