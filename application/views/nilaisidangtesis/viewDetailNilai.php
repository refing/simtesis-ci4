<main>
    <div class="container-fluid px-4">        
        <h5 class="mt-4 mb-4"><?php echo $title?></h5>

        <form action="<?php echo current_url();?>" method="post" id="MyForm">
            <div class="row">
                <div class="col-xl-12">                
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit me-1"></i>
                            <?php echo $title?>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Nama Mahasiswa</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->nama_mahasiswa;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">NRP</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->nrp;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Judul</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->judul_tesis;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Dosen Pembimbing I</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->dosbing1;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Dosen Pembimbing II</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->dosbing2;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Dosen Penguji I</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->penguji1;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Dosen Penguji II</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->penguji2;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Dosen Penguji III</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->penguji3;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Nilai</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->nilai;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3">Status</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->status_finalthesis;?>" readonly>
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
                                    <a href="<?php echo base_url('jadwalsidangtesis');?>" class="btn btn-dark">
                                        <i class="fas fa-long-arrow-alt-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
    </div>
</main>