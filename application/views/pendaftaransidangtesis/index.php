<main>
    <!-- START CONTENT -->
    <div class="container-fluid px-4">
        
        <h5 class="mt-4 mb-4"><?php echo $title?></h5>

        <form action="<?php echo base_url('pendaftaransidangtesis/verifikasi');?>" method="post" enctype="multipart/form-data" id="MyForm">
            <input type="hidden" name="id_pengajuan" value="<?php echo (isset($edit) && $edit->id_pengajuan ? $edit->id_pengajuan : '');?>">
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
                                    <input class="form-control" type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo (set_value('nama_mahasiswa') ? set_value('nama_mahasiswa') : (isset($edit) && $edit->nama_mahasiswa ? $edit->nama_mahasiswa : $user_nama) );?>">
                                    <?php echo form_error('nama_mahasiswa', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="nrp">NRP</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="nrp" id="nrp" value="<?php echo (set_value('nrp') ? set_value('nrp') : (isset($edit) && $edit->nrp ? $edit->nrp : '') );?>">
                                    <?php echo form_error('nrp', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="email">Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" name="email" id="email" value="<?php echo (set_value('email') ? set_value('email') : (isset($edit) && $edit->email ? $edit->email : $user_email) );?>">
                                    <?php echo form_error('email', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="dosen_pembimbing_1">Dosen Pembimbing I</label>
                                <div class="col-md-9">
                                    <select name="dosen_pembimbing_1" id="dosen_pembimbing_1" class="form-control select2" style="width:100%;">
                                        <option value="">- PILIH DOSEN PEMBIMBING -</option>
                                        <?php
                                        if($dosen_pembimbing)
                                        {
                                            foreach($dosen_pembimbing as $row_dosen)
                                            {
                                                $selected = (set_value('dosen_pembimbing_1') ? set_value('dosen_pembimbing_1') : (isset($dosen_pembimbing_1) && @$dosen_pembimbing_1->id_dosen ? @$dosen_pembimbing_1->id_dosen : '') == $row_dosen->id_dosen ? 'selected' : '');
                                                echo '<option value="'.$row_dosen->id_dosen.'" '.$selected.'>'.$row_dosen->nama_dosen.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('dosen_pembimbing_1', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="dosen_pembimbing_2">Dosen Pembimbing II</label>
                                <div class="col-md-9">
                                    <select name="dosen_pembimbing_2" id="dosen_pembimbing_2" class="form-control select2" style="width:100%;">
                                        <option value="">- PILIH DOSEN PEMBIMBING -</option>
                                        <?php
                                        if($dosen_pembimbing)
                                        {
                                            foreach($dosen_pembimbing as $row_dosen)
                                            {
                                                $selected = (set_value('dosen_pembimbing_2') ? set_value('dosen_pembimbing_2') : (isset($dosen_pembimbing_2) && @$dosen_pembimbing_2->id_dosen ? @$dosen_pembimbing_2->id_dosen : '') == $row_dosen->id_dosen ? 'selected' : '');
                                                echo '<option value="'.$row_dosen->id_dosen.'" '.$selected.'>'.$row_dosen->nama_dosen.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('dosen_pembimbing_2', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="judul_tesis">Judul Tesis</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="judul_tesis" id="judul_tesis" value="<?php echo (set_value('judul_tesis') ? set_value('judul_tesis') : (isset($edit) && $edit->judul_tesis ? $edit->judul_tesis : '') );?>">
                                    <?php echo form_error('judul_tesis', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="dosen_penguji_1">Dosen Penguji I</label>
                                <div class="col-md-9">
                                    <select name="dosen_penguji_1" id="dosen_penguji_1" class="form-control select2" style="width:100%;">
                                        <option value="">- PILIH DOSEN PENGUJI -</option>
                                        <?php
                                        if($dosen_penguji)
                                        {
                                            foreach($dosen_penguji as $row_dosen)
                                            {
                                                $selected = (set_value('dosen_penguji_1') ? set_value('dosen_penguji_1') : (isset($dosen_penguji_1) && @$dosen_penguji_1->id_dosen ? @$dosen_penguji_1->id_dosen : '') == $row_dosen->id_dosen ? 'selected' : '');
                                                echo '<option value="'.$row_dosen->id_dosen.'" '.$selected.'>'.$row_dosen->nama_dosen.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('dosen_penguji_1', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="dosen_penguji_2">Dosen Penguji II</label>
                                <div class="col-md-9">
                                    <select name="dosen_penguji_2" id="dosen_penguji_2" class="form-control select2" style="width:100%;">
                                        <option value="">- PILIH DOSEN PENGUJI -</option>
                                        <?php
                                        if($dosen_penguji)
                                        {
                                            foreach($dosen_penguji as $row_dosen)
                                            {
                                                $selected = (set_value('dosen_penguji_2') ? set_value('dosen_penguji_2') : (isset($dosen_penguji_2) && @$dosen_penguji_2->id_dosen ? @$dosen_penguji_2->id_dosen : '') == $row_dosen->id_dosen ? 'selected' : '');
                                                echo '<option value="'.$row_dosen->id_dosen.'" '.$selected.'>'.$row_dosen->nama_dosen.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('dosen_penguji_2', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="dosen_penguji_3">Dosen Penguji III</label>
                                <div class="col-md-9">
                                    <select name="dosen_penguji_3" id="dosen_penguji_3" class="form-control select2" style="width:100%;">
                                        <option value="">- PILIH DOSEN PENGUJI -</option>
                                        <?php
                                        if($dosen_penguji)
                                        {
                                            foreach($dosen_penguji as $row_dosen)
                                            {
                                                $selected = (set_value('dosen_penguji_3') ? set_value('dosen_penguji_3') : (isset($dosen_penguji_3) && @$dosen_penguji_3->id_dosen ? @$dosen_penguji_3->id_dosen : '') == $row_dosen->id_dosen ? 'selected' : '');
                                                echo '<option value="'.$row_dosen->id_dosen.'" '.$selected.'>'.$row_dosen->nama_dosen.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('dosen_penguji_3', '<span class="text-danger text-error">', '</span>');?>
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
                                    <input class="form-control" type="file" name="form_bimbingan1" id="form_bimbingan1" value="<?php echo set_value('form_bimbingan1');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                    <?php echo form_error('form_bimbingan1', '<span class="text-danger text-error">', '</span>');?>

                                    <?php if(@$edit->form_bimbingan1){?>
                                        <div class=" mt-3 text-danger fw-bold">
                                            ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                            <input type="hidden" name="form_bimbingan1_lama" value="<?php echo $edit->form_bimbingan1; ?>">
                                        </div>
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->form_bimbingan1); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_bimbingan1; ?>
                                            </a>
                                        </div>  
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="form_bimbingan2">Form Bimbingan II</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="form_bimbingan2" id="form_bimbingan2" value="<?php echo set_value('form_bimbingan2');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                    <?php echo form_error('form_bimbingan2', '<span class="text-danger text-error">', '</span>');?>

                                    <?php if(@$edit->form_bimbingan2){?>
                                        <div class=" mt-3 text-danger fw-bold">
                                            ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                            <input type="hidden" name="form_bimbingan2_lama" value="<?php echo $edit->form_bimbingan2; ?>">
                                        </div>
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->form_bimbingan2); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_bimbingan2; ?>
                                            </a>
                                        </div>  
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="form_persetujuan">Form Persetujuan</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="form_persetujuan" id="form_persetujuan" value="<?php echo set_value('form_persetujuan');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                    <?php echo form_error('form_persetujuan', '<span class="text-danger text-error">', '</span>');?>

                                    <?php if(@$edit->form_persetujuan){?>
                                        <div class=" mt-3 text-danger fw-bold">
                                            ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                            <input type="hidden" name="form_persetujuan_lama" value="<?php echo $edit->form_persetujuan; ?>">
                                        </div>
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->form_persetujuan); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_persetujuan; ?>
                                            </a>
                                        </div>  
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="laporan_tesis">Laporan Tesis</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="laporan_tesis" id="laporan_tesis" value="<?php echo set_value('laporan_tesis');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                    <?php echo form_error('laporan_tesis', '<span class="text-danger text-error">', '</span>');?>

                                    <?php if(@$edit->laporan_tesis){?>
                                        <div class=" mt-3 text-danger fw-bold">
                                            ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                            <input type="hidden" name="laporan_tesis_lama" value="<?php echo $edit->laporan_tesis; ?>">
                                        </div>
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->laporan_tesis); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->laporan_tesis; ?>
                                            </a>
                                        </div>  
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="berita_acara">Berita Acara</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="berita_acara" id="berita_acara" value="<?php echo set_value('berita_acara');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                    <?php echo form_error('berita_acara', '<span class="text-danger text-error">', '</span>');?>

                                    <?php if(@$edit->berita_acara){?>
                                        <div class=" mt-3 text-danger fw-bold">
                                            ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                            <input type="hidden" name="berita_acara_lama" value="<?php echo $edit->berita_acara; ?>">
                                        </div>
                                        <div class="alert alert-secondary">
                                            <a href="<?php echo base_url('uploads/pendaftaransidangtesis/' . $edit->berita_acara); ?>" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-alt me-1"></i> <?php echo $edit->berita_acara; ?>
                                            </a>
                                        </div>  
                                    <?php } ?>
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
                                    <button type="submit" class="btn btn-primary">
                                        Selanjutnya <i class="fa fa-long-arrow-alt-right"></i>
                                    </button>
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