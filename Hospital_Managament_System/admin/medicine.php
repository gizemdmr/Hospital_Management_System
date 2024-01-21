<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
<div class="row">
        <div class="col-md-5">
            <h1>Medicine</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Medicine</li>
            </ol>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-12">
            <?php include("message.php"); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Medicine Information
                    <?php
                                        $deger = $_SESSION['auth_user']['sicil'];
                                        $query = "SELECT * FROM personel WHERE sicil = '$deger'";
                                        $query_run = mysqli_query($con, $query);
                                              
                                        if (mysqli_num_rows($query_run) > 0) 
                                         {?>
                                        <a href="medicine_add.php" class='btn btn-primary float-end'>Add Medicine</a>
                                        <?php }
                                        ?>
                                
                        
                    </h4>
                </div>
                <div class="card-body">
                    <table class='table table-bordered table-responsive' id="table" data-toggle="table"
                        data-search="true" data-filter-control="true" data-show-export="true"
                        data-click-to-select="true" data-toolbar="#toolbar">
                        <thead>
                            <tr>
                                <th data-field="medicine_id" data-filter-control="input" data-sortable="true">Medicine ID</th>
                                <th data-field="name" data-filter-control="input" data-sortable="true">Medicine Name</th>
                                <th data-field="medicine_category_id" data-filter-control="input" data-sortable="true">Medicine Kategori</th>
                                <th data-field="price" data-filter-control="input" data-sortable="true">Medicine Price (TL)</th>
                                <th data-field="stok" data-filter-control="input" data-sortable="true">Medicine Stok</th>
                                <?php
                                        $deger = $_SESSION['auth_user']['sicil'];
                                        $query = "SELECT * FROM personel WHERE sicil = '$deger'";
                                        $query_run = mysqli_query($con, $query);
                                              
                                        if (mysqli_num_rows($query_run) > 0) 
                                         {?>
                                        <th>Edit</th>
                                        <?php }
                                        ?>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $query = "SELECT * FROM medicine";
                                $query_run = mysqli_query($con, $query);               
                                if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['medicine_id']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td>
                                        <?php
                                          $query1 = "SELECT * FROM medicine_category ORDER BY medicine_category_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($row['medicine_category_id'] == $row1['medicine_category_id']){?>
                                                <option value="<?= $row1['medicine_category_id'];?>"><?= $row1['name']; ?></option>
                                            <?php }?>
                                                <?php
                                            }
                                        }?>
                                        </td>
                                        <td><?= $row['price']; ?></td>
                                        <td><?= $row['stok']; ?></td> 
                                        <?php
                                        $deger = $_SESSION['auth_user']['sicil'];
                                        $query = "SELECT * FROM personel WHERE sicil = '$deger'";
                                        $query_run = mysqli_query($con, $query);
                                              
                                        if (mysqli_num_rows($query_run) > 0) 
                                         {?>
                                        <td><a href="medicine_edit.php?medicine_id=<?= $row['medicine_id']; ?>" class='btn btn-success'>Edit</a></td> 
                                        <?php }
                                        ?>
                                                          
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