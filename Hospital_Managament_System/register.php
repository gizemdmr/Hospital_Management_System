<?php
session_start();
include("admin/config/dbcon.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <?php
                include("message.php");
                ?>
                <div class="card card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="registercode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>TC Kimlik Numarası</label>
                                <input required type="text" name="tc" placeholder="Enter Your TC Number"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input required type="text" name="fname" placeholder="Enter Your First Name"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Surname</label>
                                <input required type="text" name="lname" placeholder="Enter Your Last Name"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input required type="email" name="email" placeholder="Enter Email Adress"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Address</label>
                                <input required type="text" name="adres" placeholder="Enter Your Address"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone Number</label>
                                <input required type="text" name="phone" placeholder="Enter Your Phone Number"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-md-6">
                                    <label for="">Blood Type</label>
                                    <select name="blood_type" required class="form-control">
                                        <option value="">----Select Blood Type----</option> 
                                        <?php
                                        $query = "SELECT * FROM blood_bank ORDER BY blood_group_id" ;
                                          $query_run = mysqli_query($con, $query);
                                          if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) { 
                                            ?>
                                                <option value="<?= $row['blood_group_id']?>"><?= $row['blood_group']?></option>
                                                <?php
                                            }
                                        }?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-check-label" for="flexRadioDefault2">Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="kadın" value='Kadın'>
                                        <label class="form-check-label" for="flexRadioDefault1">Kadın</label> <br/>
                                        <input class="form-check-input" type="radio" name="gender" id="erkek" value='Erkek'>
                                        <label class="form-check-label" for="flexRadioDefault2">Erkek</label>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="form-group mb-3">
                            <label>Birth Date</label>
                                <input required type="date" name="date" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input required type="password" name="password" placeholder="Enter Your Password"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input required type="password" name="cpassword" placeholder="Confirm Your Password"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name='register_btn' class="btn btn-primary">Register Now</button>
                            </div>
                            <a href="patient_login.php" class="card-link">If you have already an account go to login
                                page !!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>