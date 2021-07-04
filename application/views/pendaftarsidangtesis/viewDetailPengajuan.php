<main>
    <!-- START CONTENT -->
    <div class="container-fluid px-4">
        
        <h5 class="mt-4 mb-4"><?php echo $title?></h5>

         <form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data" id="MyForm">
            <div class="row">
                <div class="col-xl-12">                
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit me-1"></i>
                            Form Pengisian Data Diri
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
                                <label class="col-md-3" for="form_bimbingan1">Form Bimbingan I</label>
                                <div class="col-md-9">
                                    <div class="alert alert-secondary">
                                        <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->form_bimbingan1); ?>" target="_blank" class="text-decoration-none">
                                            <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_bimbingan1; ?>
                                        </a>
                                    </div>      
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="form_bimbingan2">Form Bimbingan II</label>
                                <div class="col-md-9">
                                    <div class="alert alert-secondary">
                                        <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->form_bimbingan2); ?>" target="_blank" class="text-decoration-none">
                                            <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_bimbingan2; ?>
                                        </a>
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="form_persetujuan">Form Persetujuan</label>
                                <div class="col-md-9">
                                    <div class="alert alert-secondary">
                                        <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->form_persetujuan); ?>" target="_blank" class="text-decoration-none">
                                            <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_persetujuan; ?>
                                        </a>
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="berita_acara">Berita Acara</label>
                                <div class="col-md-9">
                                    <div class="alert alert-secondary">
                                        <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->berita_acara); ?>" target="_blank" class="text-decoration-none">
                                            <i class="fas fa-file-alt me-1"></i> <?php echo $edit->berita_acara; ?>
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
                                    <a href="<?php echo base_url('pendaftarsidangtesis');?>" class="btn btn-primary">
                                        <i class="fa fa-long-arrow-alt-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- END CONTENT -->
</main>