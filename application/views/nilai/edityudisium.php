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
    <?php $this->load->view("template/headernav.php") ?>   
        <div id="layoutSidenav">
        <?php $this->load->view("template/sidenav.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <!-- START CONTENT -->
                        <div id="content-wrapper">
                            <div class="container-fluid">
                                <h1 class="mt-4">Edit Status Yudisium</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Edit Status Yudisium</li>
                                </ol>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <a href="<?php echo site_url('nilaiyudisium') ?>"><i class="fas fa-arrow-left"></i>
                                        Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php base_url("nilaiyudisium/edit") ?>" method="post"
                                            enctype="multipart/form-data" >

                                            <input type="hidden" name="user_id" value="<?php echo $nilai->user_id?>" />

                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <span class="form-control"
                                                type="text" name="nama"><?php echo $nilai->nama ?></span>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="nrp">NRP</label>
                                                <span class="form-control"
                                                type="text" name="nrp"><?php echo $nilai->nrp ?></span>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="judul">Judul</label>
                                                <span class="form-control"
                                                type="text" name="judul"><?php echo $nilai->judul ?></span>
                                            </div>

                                           

                                            <div class="form-group mt-2">
                                                <label for="status">Status</label>
                                                <select class="form-select" name="status" aria-label="Status">
                                                    <option selected><?php echo $nilai->statusyudisium ?></option>
                                                    <option>Belum Tersedia</option>
                                                    <option>LULUS</option>
                                                    <option>TIDAK LULUS</option>
                                                </select>
                                            </div>


                                            

                                            <input class="btn btn-success mt-4" type="submit" name="btn" value="Save" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <!-- END CONTENT -->
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
