<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="py-5">
    <div class="container">
        
        <div class="p-3 mb-2 bg-primary text-white text-center" style="margin-top: 20px;">For Patient</div>
        <div class="row justify-content-center text-center" style="margin-top: 30px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">IF YOU HAVE ALREADY AN ACCOUNT</h5>
                        <p class="card-text">You can log in with your e-mail address and password.</p>
                        <a href="patient_login.php" class="btn btn-primary">Go to Login Page</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">IF YOU DON'T HAVE AN ACCOUNT</h5>
                        <p class="card-text">If you do not have an account, you can register with your personal information.</p>
                        <a href="register.php" class="btn btn-primary">Go to Register Page</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="p-3 mb-2 bg-warning text-dark text-center" style="margin-top: 100px;">For Personel</div>
        <div class="row justify-content-center text-center" style="margin-top: 30px;">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PERSONEL lOGIN PAGE</h5>
                        <p class="card-text">You can log in with your e-mail address and password.</p>
                        <a href="personel_login.php" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>