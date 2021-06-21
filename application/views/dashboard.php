<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SIM TESIS</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= site_url('dashboard') ?>">SIM TESIS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            
            </form>
            <!-- Navbar-->
            <div class="small">
                
            </div>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <span class="text-white mt-2 ps-1" ><?php echo $users->nama ?></span>
                <li class="nav-item dropdown">
                    
                        
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= site_url('login/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <?php if ($this->session->userdata('role')=='mahasiswa'): ?>
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <!-- <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>-->
                                <div class="sb-sidenav-menu-heading">Menu</div> 
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDaftar" aria-expanded="false" aria-controls="collapseDaftar">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Pendaftaran
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseDaftar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('pendaftaran/sempro') ?>">Pendaftaran Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaran/sidang') ?>">Pendaftaran Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaran/yudisium') ?>">Pendaftaran Yudisium</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseData" aria-expanded="false" aria-controls="collapseData">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Data Diri
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('datadiri') ?>">Data Diri Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('datadiri') ?>">Data Diri Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('datadiri') ?>">Data Diri Yudisium</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                    Jadwal
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseJadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('jadwal/sempro') ?>">Jadwal Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('jadwal/sidang') ?>">Jadwal Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerkas" aria-expanded="false" aria-controls="collapseBerkas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Berkas & Lap Final
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseBerkas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('berkas/sempro') ?>">Berkas Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('berkas/sidang') ?>">Berkas Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNilai" aria-expanded="false" aria-controls="collapseNilai">
                                    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                    Nilai & Status
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseNilai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('nilai/sempro') ?>">Nilai Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('nilai/sidang') ?>">Nilai Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('nilai/yudisium') ?>">Status Yudisium</a>
                                    </nav>
                                </div>




                            
                            </div>
                        </div>
                    <?php elseif ($this->session->userdata('role')=='admin'): ?>
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <!-- <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>-->
                                <div class="sb-sidenav-menu-heading">Menu</div> 
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDaftar" aria-expanded="false" aria-controls="collapseDaftar">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Pendaftaran
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseDaftar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('pendaftaran/sempro') ?>">Pendaftaran Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaran/sidang') ?>">Pendaftaran Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaran/yudisium') ?>">Pendaftaran Yudisium</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                    Jadwal
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseJadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('jadwal/sempro') ?>">Jadwal Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('jadwal/sidang') ?>">Jadwal Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerkas" aria-expanded="false" aria-controls="collapseBerkas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Berkas & Lap Final
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseBerkas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('berkas/sempro') ?>">Berkas Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('berkas/sidang') ?>">Berkas Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNilai" aria-expanded="false" aria-controls="collapseNilai">
                                    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                    Nilai & Status
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseNilai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('nilai/sempro') ?>">Nilai Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('nilai/sidang') ?>">Nilai Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('nilai/yudisium') ?>">Status Yudisium</a>
                                    </nav>
                                </div>




                            
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $users->nama ?>
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Selamat Datang, <?php echo $users->nama ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Anda belum melakukan pendaftaran seminar proposal</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Seminar Proposal</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Daftar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Sidang Tesis</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Daftar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Yudisium</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Daftar</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/demo/chart-area-demo.js')?>"></script>
        <script src="<?php echo base_url('assets/demo/chart-bar-demo.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/datatables-simple-demo.js')?>"></script>
    </body>
</html>
