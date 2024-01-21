<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>
<script>
if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
</script>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-5">
            <h1>Appointment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Appointment</li>
            </ol>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header text-bg-dark">
                    <div class="row">
                    <h4 class='col-md-11'>Randevu Al</h4>
                    <a href="take_appointment.php" class='btn btn-light float-end col-md-1'>Back</a>
                    </div>
                </div>
                <div class="card-body text-bg-warning">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                            if (isset($_POST["add_app"])) { 
                                $tarih = $_POST['date'];
                                $pol = $_POST['department'];
                            }

                        
                                $deger = $_SESSION['auth_user']['TC'];
                                $query = "SELECT * FROM patient WHERE TC = '$deger'";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run)) {
                                    foreach ($query_run as $user) { ?>
                                    <input type="hidden" name="patient_id" value="<?= $user['patient_id'] ?>">
                                    <div class="row mb-5">
                                        <div class="col-md-6 mb-3">
                                            <label for="">TC Kimlik Numarası</label>
                                            <input type="text" name="TC" value="<?= $user['TC'] ?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" value="<?= $user['fname'].' '.$user['lname'] ?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Poliklinik</label>
                                            <?php 
                                             $query = "SELECT * FROM department";
                                             $query_run = mysqli_query($con, $query);
                                             if (mysqli_num_rows($query_run)) {
                                                 foreach ($query_run as $user) {
                                                    if($user['department_id']==$pol){?>
                                                        <input type="text" name="department" value="<?=$user['name'] ?>" class="form-control" readonly>
                                            <?php   } 
                                                 }
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Tarih</label>                                            
                                            <input type="text" name="date" value="<?= $tarih ?>" class="form-control" readonly>
                                        </div>
                                     </div>    
         
                                <?php
                                    }
                                } 
                            
                                ?>                        
                            </div>
                           
                        </div>
                        <div class="row">
                            <hr>
                        </div>
                        <div class="row mb-3">
                           <h5>Doktor ve randevu saati seçiniz.</h5>
                        </div>
                        <div class="row  mb-3">
                            <div class="col-md-6">
                                <label for="">Doktor Seçiniz..</label>
                                <select name="doctor" id="doctor"class="form-control mb-3">
                                            <option value="">----Doktor Seç----</option>
                                            <?php
                                            $query = "SELECT * FROM  doctor " ;
                                            $query_run = mysqli_query($con, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row1) { 
                                                    if($row1['department_id']==$_POST['department']){?>
                                                        <option value="<?= $row1['doctor_id']?>"><?= $row1['fname'].' '.$row1['lname']?></option>
                                                    <?php }
                                                    
                                                    
                                                }
                                            }?>
                                            
                                        </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Randevu Saati Seçiniz..</label>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Randevu Saati Seçiniz..
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php
                                                        $query = "SELECT * FROM saatler ORDER BY saat_id";
                                                        $query_run = mysqli_query($con, $query);
                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $row) {  ?>                                                       
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="saat" id="flexRadioDefault1" value='<?= $row['saat_id']?>'>
                                                                    <label class="form-check-label" for="saat">
                                                                        <?= $row['saat']?>
                                                                    </label>
                                                                </div>
                                                                 <?php       
                                                            }
                                                        }

                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <button type='submit' name="randevu_al" class='btn btn-success float-end col-md-2'>Randevu Al</button>
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
             </div>
        </div>

</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>