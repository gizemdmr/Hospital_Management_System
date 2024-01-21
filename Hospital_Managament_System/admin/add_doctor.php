<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Doctor
                        <a href="index_technical.php" class="btn btn-dark float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="">Sicil</label>
                                <input type="text" name="sicil" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" name="adres" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="telephone" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Departman</label>
                                <select name="department" required class="form-control">
                                    <option value="">----Select Departman---</option>
                                    <?php
                                          $query = "SELECT * FROM department ORDER BY department_id" ;
                                          $query_run = mysqli_query($con, $query);
                                          if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) { ?>
                                                <option value="<?= $row['department_id'];?>"><?= $row['name']; ?></option>
                                                <?php
                                            }
                                        }?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
                                <label for="">Is user status active?</label> <br />
                                <input type="checkbox" name="status" width='90px' height='90px'>
                            </div>
                            
                             <!-- Button trigger modal -->
                            <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-primary" id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Doctor</button>
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
                                            Personel Eklenecek. Onaylıyor musunuz?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="add_doctor" class="btn btn-primary">Save changes</button>
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



<?php
include("includes/footer.php");
include("includes/scripts.php");
?>

