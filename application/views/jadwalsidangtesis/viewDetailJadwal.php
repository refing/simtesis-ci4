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
                                <label class="col-md-3" for="id_ruangan">Ruangan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $ubah->kode_ruangan;?> - <?php echo $ubah->nama_ruangan;?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="jadwal_sidang">Tanggal Sidang</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input onkeydown="event.preventDefault()" type="text" class="form-control" name="jadwal_sidang" id="jadwal_sidang" value="<?php echo ($ubah->jadwal_sidang && $ubah->jadwal_sidang != '0000-00-00' ? date('d M Y', strtotime($ubah->jadwal_sidang)) : '');?>" readonly>
                                        <span class="input-group-text input-group-jadwal-sidang"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <?php echo form_error('jadwal_sidang', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="jam_sidang">Waktu Sidang</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input onkeydown="event.preventDefault()" type="text" class="form-control" name="jam_sidang" id="jam_sidang" value="<?php echo $ubah->jam_sidang;?>" readonly>
                                        <span class="input-group-text input-group-jam-sidang"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <?php echo form_error('jam_sidang', '<span class="text-danger text-error">', '</span>');?>
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