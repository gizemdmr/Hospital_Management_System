<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-5">
            <h1>Doctor</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Doctor</li>
            </ol>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header">
                    <h4>My Profile</h4>
                </div>
                <div class="card-body">
                    <table class='table table-bordered table-success table-responsive' id="table" data-toggle="table"
                        data-search="true" data-filter-control="true" data-show-export="true"
                        data-click-to-select="true" data-toolbar="#toolbar">
                        <thead>
                            <tr>
                                <th data-field="doctor_id" data-filter-control="input" data-sortable="true">ID</th>
                                <th data-field="sicil" data-filter-control="input" data-sortable="true">Sicil</th>
                                <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
                                <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
                                <th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
                                <th data-field="phone" data-filter-control="input" data-sortable="true">Telephone</th>
                                <th data-field="address" data-filter-control="select" data-sortable="true">Adres</th>
                                <th data-field="department_id" data-filter-control="select" data-sortable="true">Department</th>
                                <th data-field="status" data-filter-control="input" data-sortable="true">Is Active</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $deger = $_SESSION['auth_user']['sicil'];
                            $query = "SELECT * FROM doctor WHERE sicil = '$deger'";
                            $query_run = mysqli_query($con, $query);
                                              
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) { 
                                    ?>
                                    <tr>
                                        <td><?= $row['doctor_id']; ?></td>
                                        <td><?= $row['sicil']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['phone']; ?></td>
                                        <td><?= $row['address']; ?></td>
                                        <?php
                                          $query1 = "SELECT * FROM department ORDER BY department_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($row['department_id'] == $row1['department_id']){?>
                                                <td><?= $row1['name']; ?></td>
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