<?php
session_start();
include("config/dbcon.php");
include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <h1 class="mt-2">Hospital Personel Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">    <?php include("../message.php"); ?></li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">İlaç Stok Bilgisi</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link mt-2" href="medicine.php">View Details</a>
                    <div class="small text-white mt-2"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Personel Bilgileri</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link mt-2" href="view_register.php">View Details</a>
                    <div class="small text-white mt-2"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Personel Ekle</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="accordion col-md-12" id="accordionExample">
                        <div class="row">
                            <a class="text-left small text-white col-md-11 mt-2" data-bs-toggle="collapse" href="#collapseExample"  aria-expanded="false" aria-controls="collapseExample">
                                Personel Bilgilerini Görüntüle
                            </a>
                        <div class="small text-white col-md-1 mt-2"><i class="fas fa-angle-right"></i></div>
                        </div>
                        <div class="collapse" id="collapseExample">
                        <div class="card card-body mt-2">
                            <div class="d-grid gap-2">
                                <a class="btn btn-dark" type="button" href = 'add_doctor.php'>Doctor</a>
                                <a class="btn btn-dark" type="button" href = 'add_nurse.php'>Nurse</a>
                                <a class="btn btn-dark" type="button" href = 'add_personel.php'>Personel</a>
                            </div>
                            
                        </div>
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