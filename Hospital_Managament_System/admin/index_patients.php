<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <h1 class="mt-2 mb-4">Hospital Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">    <?php include("../message.php"); ?></li>
    </ol>
    <?php 
         $patient = $_SESSION['auth_user']['patient_id'];
         $query = "SELECT * FROM recete";
         $query_run = mysqli_query($con, $query);                           
         if (mysqli_num_rows($query_run) > 0) {
             foreach ($query_run as $row) { 
                if($row['status'] == '0' & $row['patient_id']== $patient){
                    $_SESSION['message'] = 'Ödenmemiş Reçete Faturanız Bulunmaktadır';
                }
             }
        }

    ?>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Randevu Al</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="take_appointment.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Randevu Geçmişi</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="appointment_history.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
       
        <div class="col-xl-4 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Kişisel Bilgiler</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view_my_profile.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
include("includes/scripts.php");
?>