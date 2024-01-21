<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <h1 class="mt-2">Patient</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Patient</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Profile
                        <a href="view_my_profile.php" class="btn btn-dark float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    $deger = $_SESSION['auth_user']['TC'];
                    $query = "SELECT * FROM patient WHERE TC = '$deger'";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run)) {
                        foreach ($query_run as $user) {
                            ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="patient_id" value="<?= $user['patient_id'] ?>">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="">TC Kimlik Numarası</label>
                                            <input type="text" name="TC" value="<?= $user['TC'] ?>" class="form-control" readonly>
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
                                            <label for="">Address</label>
                                            <input type="text" name="adres" value="<?= $user['address'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Phone</label>
                                            <input type="text" name="telephone" value="<?= $user['phone'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Gender</label>
                                            <input type="text" name="gender" value="<?= $user['gender'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Birh Date</label>
                                            <input type="text" name="birth_date" value="<?= $user['birth_date']?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Age</label>
                                            <input type="text" name="age" value="<?= $user['age'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Blood Group</label>
                                            <?php
                                            $query1 = "SELECT * FROM blood_bank ORDER BY blood_group_id" ;
                                          $query_run1 = mysqli_query($con, $query1);
                                          if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $row1) { 
                                                if($user['blood_group'] == $row1['blood_group_id']){?>
                                                 <input type="text" name="blood" value="<?= $row1['blood_group']; ?>" class="form-control" readonly>
                                            <?php }?>
                                                <?php
                                            } }?>
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
                                                        Kişisel Bilgileriniz Güncellenecek. Onaylıyor musunuz?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_my_profile" class="btn btn-primary">Save changes</button>
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