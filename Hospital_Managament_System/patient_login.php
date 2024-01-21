<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include("message.php"); ?>
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>TC Kimlik Numarası</label>
                                <input type="text" name='tc' placeholder="Enter Your TC Number" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name='password' placeholder="Enter Your Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name='login_btn' class="btn btn-primary">Login</button>
                            </div>
                            <a href="register.php" class="card-link">If you don't have a account, you have to register
                                now
                                !!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>