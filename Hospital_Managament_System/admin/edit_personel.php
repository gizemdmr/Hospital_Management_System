<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <h1 class="mt-2">Personel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Personel Info</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Persoenl's Info
                        <a href="view_register.php" class="btn btn-dark float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['personel_id'])) {
                        $personel_id = $_GET['personel_id'];
                        $users = "SELECT * FROM personel WHERE personel_id='$personel_id'";
                        $users_run = mysqli_query($con, $users);

                        if (mysqli_num_rows($users_run) > 0) {
                            foreach ($users_run as $user) {
                                ?>

                                <form action="code.php" method="POST">
                                    <input type="hidden" name="personel_id" value="<?= $user['personel_id'] ?>">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">Sicil</label>
                                            <input type="text" name="sicil" value="<?= $user['sicil'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" value="<?= $user['fname'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lname" value="<?= $user['lname'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control">
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3 mt-3">
                                            <label for="">Is user status active?</label> <br />
                                            <input type="checkbox" name="status" <?= $user['status'] == '1' ? 'checked' : '' ?>
                                                width='90px' height='90px'>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-primary" id="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenterEdit">Update User</button>
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
                                                        Personel Bilgileri Güncellenecek. Onaylıyor musunuz?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_personel" class="btn btn-primary">Save changes</button>
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