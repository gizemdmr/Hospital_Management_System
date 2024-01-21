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
                    <h4>My Appointment History</h4>
                </div>
                <div class="card-body">
                    <table class='table table-bordered table-warning table-responsive' id="table" data-toggle="table"
                        data-search="true" data-filter-control="true" data-show-export="true"
                        data-click-to-select="true" data-toolbar="#toolbar">
                        <thead>
                            <tr class='table-primary'>
                                <th data-field="app_id" data-filter-control="input" data-sortable="true">ID</th>
                                <th data-field="app_tarih" data-filter-control="input" data-sortable="true">Appointment Date</th>
                                <th data-field="app_saat" data-filter-control="input" data-sortable="true">Appointment Time</th>
                                <th data-field="doctor_id" data-filter-control="input" data-sortable="true">Doctor</th>
                                <th data-field="department_id" data-filter-control="input" data-sortable="true">Departman</th>  
                                <th data-field="details" data-filter-control="input" data-sortable="true">Details</th>     
                                                  
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        
                            $deger = $_SESSION['auth_user']['patient_id'];        
                            $query = "SELECT * FROM appointment WHERE patient_id='$deger' order by app_id desc ";
                            $query_run = mysqli_query($con, $query);
                                    
                                                           
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) { 
                                  
                                    ?>
                                    <tr>
                                        <td><?= $row['app_id']; ?></td>
                                        <td><?= $row['app_tarih']; ?></td>

                                        <?php
                                          $query1 = "SELECT * FROM saatler ORDER BY saat_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($row['app_saat'] == $row1['saat_id']){?>
                                                <td><?= $row1['saat'];?></td>
                                            <?php }?>
                                                <?php
                                                }
                                            } ?>
                                            
                                            <?php
                                            $query2 = "SELECT * FROM doctor ORDER BY doctor_id" ;
                                            $query_run2 = mysqli_query($con, $query2);
                                            if (mysqli_num_rows($query_run2) > 0) {
                                              foreach ($query_run2 as $row2) { 
                                                  if($row['doctor_id'] == $row2['doctor_id']){?>
                                                    <td><?= $row2['fname'].' '.$row2['lname']; ?></td>
                                              <?php }?>
                                                  <?php
                                                  }
                                              }
                                              ?>
                                           
                                           <?php
                                            $query3 = "SELECT * FROM department ORDER BY department_id " ;
                                            $query_run3 = mysqli_query($con, $query3);
                                            if (mysqli_num_rows($query_run3) > 0) {
                                              foreach ($query_run3 as $row3) { 
                                                  if($row['department_id'] == $row3['department_id']){?>
                                                    <td><?= $row3['name']; ?></td>
                                              <?php }?>
                                                  <?php
                                                  }
                                              }
                                              ?>

                                          
                                            <td>
                                                <a href="my_appointment_details.php?app_id=<?= $row['app_id']; ?>" class='btn btn-success'>Details</a>
                                               
                                            </td>
                                            
                                         
                                            
                                            
                                            
                                           
                                    </tr>
                                    <?php

                               

                            } 
                        }else {
                                ?>
                                <tr>
                                    <td colspan='12'>No Record Found</td>
                                </tr>
                                <?php
                            } 
                        
                            ?>


                        </tbody>
                    </table>
                     
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include("includes/footer.php");
include("includes/scripts.php");
?>