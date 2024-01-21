<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-5">
            <h1>Patients</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Patients</li>
                <li class="breadcrumb-item">Appointment History</li>
            </ol>
        </div>
    </div>
   

<div class="row mt-4">
    <div class="col-md-12">
            <?php include("message.php"); ?>
        <div class="card">
            <div class="card-header">
                <h4>My Appointment History
                    <a href="appointment_history.php" class="btn btn-dark float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                       <?php 
                        if (isset($_GET['app_id'])) {
                            $app_id = $_GET['app_id'];
                            $query = "SELECT * FROM appointment WHERE app_id='$app_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) { 
                                foreach ($query_run as $user) { ?>
                                <h5>Randevu ID: <?= $user['app_id']?></h5>
                                <h5>Randevu Tarihi: <?= $user['app_tarih']?></h5>
                                
                                <?php 
                                    $saat = $user['app_saat'];
                                    $q = "SELECT * FROM saatler WHERE saat_id = '$saat' ";
                                    $q_run = mysqli_query($con, $q);
                                    if (mysqli_num_rows($q_run) > 0) { 
                                        foreach ($q_run as $saat_q) {?>
                                        <h5>Randevu Saati: <?= $saat_q['saat']?>  </h5>
                                <?php } }
                                ?>
                                 <?php 
                                    $dep= $user['department_id'];
                                    $q = "SELECT * FROM department WHERE department_id = '$dep' ";
                                    $q_run = mysqli_query($con, $q);
                                    if (mysqli_num_rows($q_run) > 0) { 
                                        foreach ($q_run as $dep_q) {?>
                                        <h5>Departman: <?= $dep_q['name']?>  </h5>
                                <?php } }
                                ?>
                                 <?php 
                                    $doctor= $user['doctor_id'];
                                    $q = "SELECT * FROM doctor WHERE doctor_id = '$doctor' ";
                                    $q_run = mysqli_query($con, $q);
                                    if (mysqli_num_rows($q_run) > 0) { 
                                        foreach ($q_run as $doc_q) {?>
                                        <h5>Doktor: <?= $doc_q['fname'].' '.$doc_q['lname']?>  </h5>
                                <?php } }
                                ?>
                                
                            <?php
                            }}
                        }    
                       ?>
                    </div>
                    <div class="col-md-6">
                        <?php 
                            $tarih = date('Y-m-d');
                            $app_id = $user['app_id'];
                            $query = "SELECT * FROM appointment WHERE app_id = '$app_id' ";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) { 
                                foreach ($query_run as $row) {
                                    if($row['status']==1){?>
                                        <h4>Hasta henüz muayene olmadığı için reçete ve fatura bilgisi oluşmamıştır !!</h4>

                                    <?php  }else{?>
                                         <p class="d-inline-flex gap-1">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Reçeteyi Gör
                                            </button>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                                                Faturayı Gör
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                            <?php 
                                                    
                                                    $q = "SELECT * FROM recete WHERE app_id = '$app_id' ";
                                                    $q_run = mysqli_query($con, $q);
                                                    if (mysqli_num_rows($q_run) > 0) { 
                                                        foreach ($q_run as $recete_q) {?>
                                                        <h5>Recete ID: <?= $recete_q['recete_id']?>  </h5>
                                                <?php } }
                                                ?>
                                                <?php 
                                                    $medicine_category_id = $recete_q['medicine_category_id'];
                                                    $q = "SELECT * FROM medicine_category WHERE medicine_category_id = '$medicine_category_id' ";
                                                    $q_run = mysqli_query($con, $q);
                                                    if (mysqli_num_rows($q_run) > 0) { 
                                                        foreach ($q_run as $cat_q) {?>
                                                        <h5>İlaç Kategorisi: <?= $cat_q['name']?>  </h5>
                                                <?php } }
                                                ?>
                                                <?php 
                                                    $medicine_id = $recete_q['medicine_id'];
                                                    $q = "SELECT * FROM medicine WHERE medicine_id = '$medicine_id' ";
                                                    $q_run = mysqli_query($con, $q);
                                                    if (mysqli_num_rows($q_run) > 0) { 
                                                        foreach ($q_run as $med_q) {?>
                                                        <h5>İlaç İsmi: <?= $med_q['name']?>  </h5>
                                                <?php } }
                                                ?>
                                                <h5>Açıklama: <?= $recete_q['description']?>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="collapse" id="collapseExample1">
                                            <div class="card card-body">
                                                <h5>Fatura Tutarı : <?= $med_q['price']?> TL 
                                                    <?php if($recete_q['status'] == '1') { ?>
                                                        (Ödendi)
                                                        <?php  } else if($recete_q['status'] == '0') { ?>
                                                            (Ödenmedi) <i class="fas fa-check-all"></i>
                                                            <?php  } ?>
                                                </h5>
                                            </div>
                                        </div>
                                        
                                        <?php 
                                    }
                                }

                            }


                        ?>
                       
                    </div>
                </div>
                

            </div>                    
        </div>
    </div>
</div>
  



<?php
include("includes/footer.php");
include("includes/scripts.php");
?>