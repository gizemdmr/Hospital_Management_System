<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <h1>Medicine</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Medicine</li>
        </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Medicine
                        <a href="medicine.php" class="btn btn-dark float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['medicine_id'])) {
                        $medicine_id= $_GET['medicine_id'];
                        $med = "SELECT * FROM medicine WHERE medicine_id='$medicine_id'";
                        $med_run = mysqli_query($con, $med);

                        if (mysqli_num_rows($med_run) > 0) {
                            foreach ($med_run as $medicine) {
                                ?>

                                <form action="code.php" method="POST">
                                    <input type="hidden" name="medicine_id" value="<?= $medicine['medicine_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Medicine Stok</label>
                                            <input type="text" name="stok" value="<?= $medicine['stok'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Medicine Name</label>
                                            <input type="text" name="name" value="<?= $medicine['name'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Medicine Kategori</label>
                                            <select name="medicine_category" required class="form-control">
                                                <option value="">----Select Medicine Kategori----</option>
                                                <?php
                                                    $query = "SELECT * FROM medicine_category ORDER BY medicine_category_id" ;
                                                    $query_run = mysqli_query($con, $query);
                                                    if (mysqli_num_rows($query_run) > 0) {
                                                        foreach ($query_run as $row) { 
                                                        ?>
                                                            <option value="<?= $row['medicine_category_id']?>" <?= $medicine['medicine_category_id'] == $row['medicine_category_id'] ? 'selected' : ''; ?>><?= $row['name'];?></option>
                                                            <?php
                                                        }
                                                    }?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Medicine Price</label>
                                            <input type="text" name="price" value="<?= $medicine['price'] ?>" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-primary" id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenterEdit">Update Medicine</button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Onaylıyor musun?</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        İlaç Bilgileri Güncellenecek. Onaylıyor musunuz?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_medicine" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <?php
                            }
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
include("includes/footer.php");
include("includes/scripts.php");
?>