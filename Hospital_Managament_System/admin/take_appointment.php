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
                    <a href="index_patients.php" class='btn btn-light float-end col-md-1'>Back</a>
                    </div>
                </div>
                <div class="card-body text-bg-warning">
                    <form action="take_appointment_devam.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                                $deger = $_SESSION['auth_user']['TC'];
                                $query = "SELECT * FROM patient WHERE TC = '$deger'";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run)) {
                                    foreach ($query_run as $user) { ?>
                                    <input type="hidden" name="patient_id" value="<?= $user['patient_id'] ?>">
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <label for="">TC Kimlik Numarası</label>
                                            <input type="text" name="TC" value="<?= $user['TC'] ?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" value="<?= $user['fname'].' '.$user['lname'] ?>" class="form-control" readonly>
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
                           <h5>Randevu almak istediğiniz tarihi ve poliklinik bilgisini seçiniz.</h5>
                        </div>
                        <div class="row  mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="">Poliklinik Seçiniz..</label>
                                <select name="department" required class="form-control">
                                    <option value="">----Select Department----</option>
                                    <?php
                                          $query = "SELECT * FROM department ORDER BY department_id" ;
                                          $query_run = mysqli_query($con, $query);
                                          if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) { 
                                            ?>
                                                <option value="<?= $row['department_id']?>" ?><?= $row['name'];?></option>
                                                <?php
                                            }
                                        }?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Randevu Tarihi Seçiniz..</label>
                                <input type="date" name="date"  class="form-control">
                            </div>
                            <div class=" mb-3">
                                <button type='submit' name="add_app" class = 'btn btn-success float-end col-md-2'>Devam</button>
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