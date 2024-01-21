<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-5">
            <h1>Patient</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Patient</li>
            </ol>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h4 class='col-md-11'>My Profile</h4>
                    <a href="edit_my_profile.php" class='btn btn-primary float-end col-md-1'>Edit My Profile</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class='table table-bordered table-success table-responsive' id="table" data-toggle="table"
                        data-search="true" data-filter-control="true" data-show-export="true"
                        data-click-to-select="true" data-toolbar="#toolbar">
                        <thead>
                            <tr>
                                <th data-field="patient_id" data-filter-control="input" data-sortable="true">ID</th>
                                <th data-field="TC" data-filter-control="input" data-sortable="true">TC Kimlik No</th>
                                <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
                                <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
                                <th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
                                <th data-field="phone" data-filter-control="input" data-sortable="true">Telephone</th>
                                <th data-field="address" data-filter-control="select" data-sortable="true">Adres</th>
                                <th data-field="gender" data-filter-control="select" data-sortable="true">Gender</th>
                                <th data-field="birth_date" data-filter-control="input" data-sortable="true">Birth Date</th>
                                <th data-field="age" data-filter-control="input" data-sortable="true">Age</th>
                                <th data-field="blood_group" data-filter-control="input" data-sortable="true">Blood Type</th>
                                <th data-field="status" data-filter-control="input" data-sortable="true">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $deger = $_SESSION['auth_user']['TC'];
                            $query = "SELECT * FROM patient WHERE TC = '$deger'";
                            $query_run = mysqli_query($con, $query);
                                              
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) { 
                                    ?>
                                    <tr>
                                        <td><?= $row['patient_id']; ?></td>
                                        <td><?= $row['TC']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['phone']; ?></td>
                                        <td><?= $row['address']; ?></td>
                                        <td><?= $row['gender']; ?></td>
                                        <td><?= $row['birth_date']; ?></td>
                                        <td><?= $row['age']; ?></td>
                                        <?php
                                          $query1 = "SELECT * FROM blood_bank ORDER BY blood_group_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($row['blood_group'] == $row1['blood_group_id']){?>
                                                <td><?= $row1['blood_group']; ?></td>
                                            <?php }?>
                                                <?php
                                            }
                                        }?>
                                        <td>
                                            <?php
                                            if ($row['status'] == '1') {
                                                echo 'Active';
                                            } else if ($row['status'] == '0') {
                                                echo 'Pasive';
                                            } ?>
                                        </td>
                                     
                                    </tr>
                                    <?php

                                }

                            } else {
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