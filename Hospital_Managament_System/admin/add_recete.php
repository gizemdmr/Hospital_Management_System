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
                <li class="breadcrumb-item">Patients</li>
            </ol>
        </div>
    </div>
    

    <div class="row mt-4">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header">
                    <?php 
                    if (isset($_GET['app_id'])) {
                        $app_id = $_GET['app_id'];
                        $query = "SELECT * FROM appointment a, patient p 
                        where a.app_id='$app_id'
                        and a.patient_id=p.patient_id";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) { 
                            foreach ($query_run as $user) { ?>
                           <h4><?= $user['fname'].' '.$user['lname']; ?> Appointment Detail</h4>
                        <?php
                        }}
                    }
                    ?>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" data-field="patient_id" data-filter-control="input" data-sortable="true" class = "table-dark">ID</th>
                            <th scope="col" data-field="TC" data-filter-control="input" data-sortable="true" class = "table-dark">TC Kimlik Numarası</th>
                            <th scope="col" data-field="name" data-filter-control="input" data-sortable="true" class = "table-dark">Ad Soyad</th>
                            <th scope="col" data-field="birth_date" data-filter-control="input" data-sortable="true" class = "table-dark">Doğum Tarihi</th>
                            <th scope="col" data-field="age" data-filter-control="input" data-sortable="true" class = "table-dark">Yaş</th>
                            <th scope="col" data-field="blood_group" data-filter-control="input" data-sortable="true" class = "table-dark">Kan Grubu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-warning">
                            <th scope="row" name='patient_id' value='<?= $user['patient_id']?>'><?= $user['patient_id']?></th>
                                <td><?= $user['TC']?></td>
                                <td><?= $user['fname'].' '.$user['lname']; ?></td>
                                <td><?= $user['birth_date']?></td>
                                <td><?= $user['age']?></td>
                                <?php
                                    $query1 = "SELECT * FROM blood_bank ORDER BY blood_group_id" ;
                                    $query_run1 = mysqli_query($con, $query1);
                                    if (mysqli_num_rows($query_run1) > 0) {
                                        foreach ($query_run1 as $row1) { 
                                            if($user['blood_group'] == $row1['blood_group_id']){?>
                                                 <td><?= $row1['blood_group']?></td>
                                            <?php }?>
                                                <?php
                                    } }?>                                
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-md-12 mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" data-field="app_id" data-filter-control="input" data-sortable="true" class = "table-dark">ID</th>
                            <th scope="col" data-field="app_tarih" data-filter-control="input" data-sortable="true" class = "table-dark">Appointment Tarihi</th>
                            <th scope="col" data-field="app_saat" data-filter-control="input" data-sortable="true" class = "table-dark">Appointment Saati</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-warning">
                                <th scope="row"><?= $user['app_id']?></th>
                                <td><?= $user['app_tarih']?></td>
                                <?php $query1 = "SELECT * FROM saatler ORDER BY saat_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($user['app_saat'] == $row1['saat_id']){?>
                                                <td><?= $row1['saat']?></td>
                                            <?php }?>
                                                <?php
                                                }
                                            } ?>
                                
                            </tr>
                            </tbody>
                    </table>
                    </div>
                    <div class="col-md-12 mt-5">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Reçete Yaz
                        </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                        <div class="card card-body ">
                            <div class="col-md-6 mb-3">
                                <form action="code.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Appointment Id</label>
                                            <input type="text" class="form-control mb-3" name='app_id' value=<?=$user['app_id']?> readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Patient Id</label>
                                            <input type="text" class="form-control mb-3" name='patient_id' value=<?=$user['patient_id']?> readonly>
                                        </div>
                                    </div>

                                    <label for="">Medicine Kategori</label>
                                    <select name="medicine_category" id="medicine_category"  required class="form-control">
                                        <option value="">----Select Medicine Kategori----</option>
                                        <?php
                                            $query = "SELECT * FROM medicine_category ORDER BY medicine_category_id" ;
                                            $query_run = mysqli_query($con, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) { 
                                                ?>
                                                    <option value="<?= $row['medicine_category_id']?>"><?= $row['name'];?></option>
                                                <?php
                                                }
                                            }?>
                                    </select>
                                  
                                    <label class="mt-3" for="">Medicine Name</label>
                                    <select name="medicine_name" id="medicine_name" required class="form-control">
                                        <option value="">----Select Medicine----</option>
                                        <?php
                                            $query1 = "SELECT * FROM medicine ORDER BY medicine_id" ;
                                            $query_run1 = mysqli_query($con, $query1);
                                            if (mysqli_num_rows($query_run1) > 0) {
                                                foreach ($query_run1 as $row1) { 
                                                ?>
                                                    <option value="<?= $row1['medicine_id']?>"><?= $row1['name'];?></option>
                                                <?php
                                                }
                                            }?>
                                    </select>
                                    <div>
                                        <label class="mt-3" for="">Açıklama</label></br>
                                        <textarea class="mt-10" name="comment" rows="5" cols="40"></textarea>
                                    </div>
                                    <div>
                                          <!-- Button trigger modal -->
                                    <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-primary" id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Reçete Oluştur</button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Onaylıyor musun?</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Reçete Oluşturulacak Onaylıyor musunuz?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="add_recete" class="btn btn-primary">Oluştur</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </form>
                                </div>       
                            </div>
                            
                            </div>
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