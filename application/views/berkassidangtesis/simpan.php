<main>
    <!-- START CONTENT -->
    <div class="container-fluid px-4">
        
        <h5 class="mt-4 mb-4"><?php echo $title?></h5>

        <?php if($status >= 6) { ?>

            <div class="row mb-5 mt-5 content justify-content-center">
                <div class="col-xl-6"> 
                    <div class="alert alert-info">
                        <div class="row">                        
                            <div class="col-1 text-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="col-11">
                                <p class="fw-bold text-dark">
                                    Selamat!!!
                                </p>
                                <p class="fw-semi-bold text-dark">
                                    Data pendaftaran anda berhasil masuk ke sistem kami.
                                    <br>
                                    Silahkan kembali ke dashboard.
                                </p>
                            </div>
                        </div>
                    </div>  
                    <div class="row">                        
                        <div class="col-12 text-center">
                            <a class="btn btn-dark" href="<?php echo base_url('dashboard');?>">
                                <i class="fa fa-long-arrow-alt-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>

            <form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data" id="MyForm">
                <div class="row">
                    <div class="col-xl-12">                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                Form Pengisian Data
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo $edit->nama_mahasiswa; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="nrp">NRP</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="nrp" id="nrp" value="<?php echo $edit->nrp; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="email">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $edit->email; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="dosen_pembimbing_1">Dosen Pembimbing I</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="tewxt" name="dosen_pembimbing_1" id="dosen_pembimbing_1" value="<?php echo @$dosen_pembimbing_1->nama_dosen; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="dosen_pembimbing_2">Dosen Pembimbing II</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="tewxt" name="dosen_pembimbing_2" id="dosen_pembimbing_2" value="<?php echo @$dosen_pembimbing_2->nama_dosen; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="judul_tesis">Judul Tesis</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text-center" name="email" id="email" value="<?php echo $edit->judul_tesis; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="dosen_penguji_1">Dosen Penguji I</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="tewxt" name="dosen_penguji_1" id="dosen_penguji_1" value="<?php echo @$dosen_penguji_1->nama_dosen; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="dosen_penguji_2">Dosen Penguji II</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="tewxt" name="dosen_penguji_2" id="dosen_penguji_2" value="<?php echo @$dosen_penguji_2->nama_dosen; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="dosen_penguji_3">Dosen Penguji III</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="tewxt" name="dosen_penguji_3" id="dosen_penguji_2" value="<?php echo @$dosen_penguji_3->nama_dosen; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-file-upload me-1"></i>
                                Form Upload Kelengkapan Berkas
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="form_revisi">Form Revisi</label>
                                    <div class="col-md-9">
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->form_revisi); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_revisi; ?>
                                            </a>
                                        </div>      
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="laporan_final">Laporan Final Tesis</label>
                                    <div class="col-md-9">
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->laporan_final); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->laporan_final; ?>
                                            </a>
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="form_nilai_akhir">Form Nilai Akhir</label>
                                    <div class="col-md-9">
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->form_nilai_akhir); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_nilai_akhir; ?>
                                            </a>
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="form_ket_ikut_sidang">Form Ket. Ikut Sidang</label>
                                    <div class="col-md-9">
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->form_ket_ikut_sidang); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_ket_ikut_sidang; ?>
                                            </a>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">                
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="form-group row mb-3">
                                    <div class="col-md-12 text-center">
                                        
                                        <input type="hidden" name="status" value="<?php echo $edit->status; ?>">

                                        <button type="button" class="btn btn-lg btn-primary" onclick="konfirmasi()">
                                            Submit <i class="fa fa-long-arrow-alt-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row mb-5 mt-5 content justify-content-center" id="MyFormConfirm" style="display:none;">
                <div class="col-xl-6"> 
                    <div class="alert alert-danger">
                        <div class="row">                        
                            <div class="col-1 text-center">
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <div class="col-11">
                                <p class="fw-bold text-dark">
                                    Finalisasi Pendaftaran?
                                </p>
                                <p class="fw-semi-bold text-dark">
                                    dengan mengklik tombol submit, berarti semua form data diri dan form berkas yang anda masukkan telah benar dan form yang telah dimasukkan tidak dapat diubah.
                                </p>
                            </div>
                        </div>
                    </div>  
                    <div class="row">                        
                            <div class="col-6">
                                <button type="button" class="btn btn-dark float-start" onclick="kembali()">
                                    <i class="fa fa-long-arrow-alt-left"></i> Kembali
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary float-end" onclick="proses()">
                                    Ya, Submit <i class="fa fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <!-- END CONTENT -->
</main>
<script>
    function konfirmasi()
    {
        $("#MyFormConfirm").slideDown();
        $("#MyForm").hide();
    }

    function kembali()
    {
        $("#MyFormConfirm").hide();
        $("#MyForm").slideDown();
    }

    function proses()
    {
        $("#MyForm").submit();
    }
</script>