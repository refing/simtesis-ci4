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
                        <h1 class="mt-4">Pendaftaran Yudisium</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Form Pendaftaran Yudisium</li>
                        </ol>
                        <div class="card mb-3">
					
                        <div class="card-body">
                                <!-- cek dulu kalo udah daftar gaboleh didaftar lagi -->
                            <form action="<?php base_url('pendaftaranyudisium/daftar') ?>" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_logged')->user_id?>" />
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <span class="form-control"
                                    type="text" name="name"> <?php echo $this->session->userdata('user_logged')->nama ?></span>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nrp">NRP</label>
                                    <span class="form-control"
                                    type="text" name="nrp"> <?php echo $this->session->userdata('user_logged')->nrp ?></span>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="judul">Judul Tesis</label>
                                    <span class="form-control"
                                    type="text" name="judul"> <?php echo $this->session->userdata('user_logged')->judul ?></span>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="dosbing1">Dosen Pembimbing I</label>
                                    <span class="form-control"
                                    type="text" name="dosbing1"><?php echo $this->session->userdata('user_logged')->dosbing1 ?></span>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="dosbing2">Dosen Pembimbing II</label>
                                    <span class="form-control"
                                    type="text" name="dosbing2"><?php echo $this->session->userdata('user_logged')->dosbing2 ?></span>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="pasfoto">Pas foto Hitam Putih 3x4</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="pasfoto" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="toefl">Sertifikat TOEFL (Skor minimum 477)</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="toefl" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="transkrip">Transkrip</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="transkrip" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="bebasbimbing">Lembar bebas pembimbing tesis</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="bebasbimbing" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="ijazah">Ijazah S1</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="ijazah" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="formwisuda">Formulir calon wisudawan</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="formwisuda" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="bebaslab">Surat bebas laboratorium</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="bebaslab" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="bebasperpus">Surat bebas pinjam perpus pusat</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="bebasperpus" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="bebasrbsi">Surat bebas pinjam ruang baca si</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="bebasrbsi" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="revisitesis">Lembar revisi tesis</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="revisitesis" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="accjurnal">Bukti publikasi accepted letter journal + paper jurnal</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="accjurnal" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="sertifseminar">Bukti publikasi sertifikat seminar dan cover prosiding + paper</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="sertifseminar" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="fcseminar">Fotocopy surat keterangan telah mengikuti seminar dari pascasarjana</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="fcseminar" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class='row'>
                                        <div class="col-sm">
                                            <label for="datawisuda">Bukti telah melakukan update data wisuda pada integra its</label>
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control-file ml-2"
                                            type="file" name="datawisuda" />
                                        </div>
                                        <div class='col-sm'></div>
                                        <div class='col-sm'></div>
                                    </div>
                                </div>

                                <input class="btn btn-success mt-3" type="submit" name="btn" value="Simpan" />
                            </form>

                        </div>
                <?php elseif ($this->session->userdata('user_logged')->role=='admin'): ?>
                    
                    <div id="content-wrapper">
			        <div class="container-fluid">
                    <h1 class="mt-4">Pendaftaran Yudisium</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Form Pendaftaran Yudisium</li>
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
                                            <th>Berkas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

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
