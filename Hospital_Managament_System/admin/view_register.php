<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-5">
            <h1>Employee</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Employee</li>
            </ol>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button text-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Doktor Bilgilerini Görüntüle
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class='table table-bordered table-responsive' id="table" data-toggle="table"
                            data-search="true" data-filter-control="true" data-show-export="true"
                            data-click-to-select="true" data-toolbar="#toolbar">
                            <thead>
                                <tr>
                                    <th data-field="doctor_id" data-filter-control="input" data-sortable="true">Doctor ID</th>
                                    <th data-field="sicil" data-filter-control="select" data-sortable="true">Sicil</th>
                                    <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
                                    <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
                                    <th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
                                    <th data-field="address" data-filter-control="select" data-sortable="true">Adres</th>
                                    <th data-field="phone" data-filter-control="input" data-sortable="true">Telephone</th>
                                    <th data-field="department_id" data-filter-control="select" data-sortable="true">Department</th>
                                    <th data-field="status" data-filter-control="input" data-sortable="true">Is Active</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                            $query = "SELECT * FROM doctor where status='1'";
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
                                        <td><?= $row['address']; ?></td>
                                        <td><?= $row['phone']; ?></td>
                                        <td><?php
                                          $query1 = "SELECT * FROM department ORDER BY department_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($row['department_id'] == $row1['department_id']){?>
                                                <option value="<?= $row1['department_id'];?>"><?= $row1['name']; ?></option>
                                            <?php }?>
                                                <?php
                                            }
                                        }?></td>
                                        <td>
                                            <?php
                                            if ($row['status'] == '1') {
                                                echo 'Active';
                                            } else if ($row['status'] == '0') {
                                                echo 'Pasive';
                                            } ?>
                                        </td>
                                        <td><a href="edit_doctor.php?doctor_id=<?= $row['doctor_id']; ?>" class='btn btn-success'>Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="button" class="btn btn-danger"
                                                    id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenterDoc">Passive</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenterDoc" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Onaylıyor
                                                                    musun?</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Personel Durumu Pasife Çekilecek. Onaylıyor musunuz?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="doctor_pasif" value="<?= $row['doctor_id']; ?>"class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed text-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Hemşire Bilgilerini Görüntüle
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class='table table-bordered table-responsive' id="table" data-toggle="table"
                                data-search="true" data-filter-control="true" data-show-export="true"
                                data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="nurse_id" data-filter-control="input" data-sortable="true">Nurse ID</th>
                                        <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
                                        <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
                                        <th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
                                        <th data-field="phone" data-filter-control="input" data-sortable="true">Telephone</th>
                                        <th data-field="address" data-filter-control="input" data-sortable="true">Adres</th>
                                        <th data-field="department_id" data-filter-control="select" data-sortable="true">Department</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            
                            $query = "SELECT * FROM nurse";
                            $query_run = mysqli_query($con, $query);
                          
                           
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['nurse_id']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['phone']; ?></td>
                                        <td><?= $row['address']; ?></td>
                                        
                                        <td><?php
                                          $query1 = "SELECT * FROM department ORDER BY department_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($row['department_id'] == $row1['department_id']){?>
                                                <option value="<?= $row1['department_id'];?>"><?= $row1['name']; ?></option>
                                            <?php }?>
                                                <?php
                                            }
                                        }?></td>

                                        <td><a href="edit_nurse.php?nurse_id=<?= $row['nurse_id']; ?>" class='btn btn-success'>Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="button" class="btn btn-danger"
                                                    id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenterNurse">Passive</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenterNurse" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Onaylıyor
                                                                    musun?</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Personel Durumu Pasife Çekilecek. Onaylıyor musunuz?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="nurse_pasif" value="<?= $row['nurse_id'];?>"class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed text-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Personel Bilgilerini Görüntüle
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class='table table-bordered table-responsive' id="table" data-toggle="table"
                                data-search="true" data-filter-control="true" data-show-export="true"
                                data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="personel_id" data-filter-control="input" data-sortable="true">Nurse ID</th>
                                        <th data-field="sicil" data-filter-control="select" data-sortable="true">Sicil</th>
                                        <th data-field="fname" data-filter-control="input" data-sortable="true">First Name</th>
                                        <th data-field="lname" data-filter-control="input" data-sortable="true">Last Name</th>
                                        <th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
                                        <th data-field="status" data-filter-control="input" data-sortable="true">Telephone</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            
                            $query = "SELECT * FROM personel where status='1'";
                            $query_run = mysqli_query($con, $query);
                          
                           
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['personel_id']; ?></td>
                                        <td><?= $row['sicil']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>                   
                                        <td>
                                            <?php
                                            if ($row['status'] == '1') {?>
                                                 <p name = 'status'> Active </p>
                                                 <?php } else if ($row['status'] == '0') { ?>
                                                    <p name = 'status'> Pasif </p>
                                                <?php } ?>
                                        </td>
                                        <td><a href="edit_personel.php?personel_id=<?= $row['personel_id']; ?>" class='btn btn-success'>Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="button" class="btn btn-danger"
                                                    id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenterPer">Passive</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenterPer" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Onaylıyor
                                                                    musun?</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Personel Durumu Pasife Çekilecek. Onaylıyor musunuz?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="personel_pasif" value="<?= $row['personel_id']; ?>"class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

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
    </div>
</div>

    


<?php
include("includes/footer.php");
include("includes/scripts.php");
?>