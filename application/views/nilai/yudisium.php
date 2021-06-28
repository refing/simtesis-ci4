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
                    <?php if ($this->session->userdata('user_logged')->role=='mahasiswa'): ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Status Yudisium</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Status Yudisium</li>
                        </ol>
                        <div class="row mb-1">
                            <h4 class="mt-4 text-center">Mahasiswa dengan identitas dibawah ini,</h4>
                            <span class="mt-2 text-center" >Nama : <?php echo $this->session->userdata('user_logged')->nama ?></span>
                            <span class="mt-2 text-center">NRP : <?php echo $this->session->userdata('user_logged')->nrp ?></span>
                            <h5 class="mt-4 text-center">Status Yudisium:</h5>
                            <h5 class="text-center"><?php echo $this->session->userdata('user_logged')->statusyudisium?></h5>
                        </div>
                    </div>
                    <?php elseif ($this->session->userdata('user_logged')->role=='admin'): ?>
                    
                        <div id="content-wrapper">
                        <div class="container-fluid">
                        <h1 class="mt-4">Status Yudisium</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Status Yudisium</li>
                        </ol>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NRP</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Judul Tesis</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $iternum = 0;
                                            foreach ($identitas as $mahasiswa): 
                                                $iternum++; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $iternum ?>
                                                </td>
                                                <td>
                                                    <?php echo $mahasiswa->nrp ?>
                                                </td>
                                                <td>
                                                    <?php echo $mahasiswa->nama ?>
                                                </td>
                                                <td>
                                                    <?php echo $mahasiswa->judul ?>
                                                </td>
                                                <td>
                                                    <?php echo $mahasiswa->statusyudisium ?>
                                                </td>
                                                <td width="250">
                                                    <a href="<?php echo site_url('nilaiyudisium/edit/'.$mahasiswa->user_id) ?>"
                                                    class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                    <!-- <a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$product->product_id) ?>')"
                                                    href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    <?php endif; ?>
                    
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
