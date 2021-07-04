<main>
    <!-- START CONTENT -->
    <div class="container-fluid px-4">
        
        <h5 class="mt-4 mb-4"><?php echo $title?></h5>

        <?php if(isset($edit)) { ?>

            <form action="<?php echo base_url('berkassidangtesis/verifikasi');?>" method="post" enctype="multipart/form-data" id="MyForm">
                <input type="hidden" name="id_pengajuan" value="<?php echo $edit->id_pengajuan;?>">
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
                                        <input class="form-control" type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo (set_value('nama_mahasiswa') ? set_value('nama_mahasiswa') : $edit->nama_mahasiswa); ?>">
                                        <?php echo form_error('nama_mahasiswa', '<span class="text-danger text-error">', '</span>');?>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="nrp">NRP</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="nrp" id="nrp" value="<?php echo (set_value('nrp') ? set_value('nrp') : $edit->nrp); ?>">
                                        <?php echo form_error('nrp', '<span class="text-danger text-error">', '</span>');?>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="email">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="email" name="email" id="email" value="<?php echo (set_value('email') ? set_value('email') : $edit->email); ?>">
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
                                                    $selected = ((set_value('dosen_pembimbing_1') ? set_value('dosen_pembimbing_1') : @$dosen_pembimbing_1->id_dosen) == $row_dosen->id_dosen ? 'selected' : '');
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
                                                    $selected = ((set_value('dosen_pembimbing_2') ? set_value('dosen_pembimbing_2') : @$dosen_pembimbing_2->id_dosen) == $row_dosen->id_dosen ? 'selected' : '');
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
                                        <input class="form-control" type="text" name="judul_tesis" id="judul_tesis" value="<?php echo (set_value('judul_tesis') ? set_value('judul_tesis') : $edit->judul_tesis);?>">
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
                                                    $selected = ((set_value('dosen_penguji_1') ? set_value('dosen_penguji_1') : @$dosen_penguji_1->id_dosen) == $row_dosen->id_dosen ? 'selected' : '');
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
                                                    $selected = ((set_value('dosen_penguji_2') ? set_value('dosen_penguji_2') : @$dosen_penguji_2->id_dosen) == $row_dosen->id_dosen ? 'selected' : '');
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
                                        <select name="dosen_penguji_3" id="dosen_penguji_3" class="form-contro select2l" style="width:100%;">
                                            <option value="">- PILIH DOSEN PENGUJI -</option>
                                            <?php
                                            if($dosen_penguji)
                                            {
                                                foreach($dosen_penguji as $row_dosen)
                                                {
                                                    $selected = ((set_value('dosen_penguji_3') ? set_value('dosen_penguji_3') : @$dosen_penguji_3->id_dosen) == $row_dosen->id_dosen ? 'selected' : '');
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
                                    <label class="col-md-3" for="form_revisi">Form Revisi</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="form_revisi" id="form_revisi" value="<?php echo set_value('form_revisi');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                        <?php echo form_error('form_revisi', '<span class="text-danger text-error">', '</span>');?>

                                        <?php if($edit->form_revisi){?>
                                            <div class=" mt-3 text-danger fw-bold">
                                                ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                                <input type="hidden" name="form_revisi_lama" value="<?php echo $edit->form_revisi; ?>">
                                            </div>
                                            <div class="alert alert-secondary">
                                                <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->form_revisi); ?>" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_revisi; ?>
                                                </a>
                                            </div>  
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="laporan_final">Laporan Final Tesis</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="laporan_final" id="laporan_final" value="<?php echo set_value('laporan_final');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                        <?php echo form_error('laporan_final', '<span class="text-danger text-error">', '</span>');?>

                                        <?php if($edit->laporan_final){?>
                                            <div class=" mt-3 text-danger fw-bold">
                                                ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                                <input type="hidden" name="laporan_final_lama" value="<?php echo $edit->laporan_final; ?>">
                                            </div>
                                            <div class="alert alert-secondary">
                                                <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->laporan_final); ?>" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-file-alt me-1"></i> <?php echo $edit->laporan_final; ?>
                                                </a>
                                            </div> 
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="form_nilai_akhir">Form Penilaian Akhir</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="form_nilai_akhir" id="form_nilai_akhir" value="<?php echo set_value('form_nilai_akhir');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                        <?php echo form_error('form_nilai_akhir', '<span class="text-danger text-error">', '</span>');?>

                                        <?php if($edit->form_nilai_akhir){?>
                                            <div class=" mt-3 text-danger fw-bold">
                                                ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                                <input type="hidden" name="form_nilai_akhir_lama" value="<?php echo $edit->form_nilai_akhir; ?>">
                                            </div>
                                            <div class="alert alert-secondary">
                                                <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->form_nilai_akhir); ?>" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_nilai_akhir; ?>
                                                </a>
                                        </div> 
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3" for="form_ket_ikut_sidang">Form Ket. Ikut Sidang</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="form_ket_ikut_sidang" id="form_ket_ikut_sidang" value="<?php echo set_value('form_ket_ikut_sidang');?>" accept="image/jpeg,image/gif,image/png,application/pdf">
                                        <?php echo form_error('form_ket_ikut_sidang', '<span class="text-danger text-error">', '</span>');?>

                                        <?php if($edit->form_ket_ikut_sidang){?>

                                            <div class=" mt-3 text-danger fw-bold">
                                                ABAIKAN ISIAN FILE, JIKA FILE TIDAK INGIN DIGANTI/DIUBAH
                                                <input type="hidden" name="form_ket_ikut_sidang_lama" value="<?php echo $edit->form_ket_ikut_sidang; ?>">
                                            </div>
                                            
                                            <div class="alert alert-secondary mt-3">
                                                <a href="<?php echo base_url('uploads/berkassidangtesis/' . $edit->form_ket_ikut_sidang); ?>" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-file-alt me-1"></i> <?php echo $edit->form_ket_ikut_sidang; ?>
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

        <?php } else { ?>

            <div class="row mb-5 mt-5 content justify-content-center">
                <div class="col-xl-6"> 
                    <div class="alert alert-info">
                        <div class="row">                        
                            <div class="col-1 text-center">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="col-11">
                                <p class="fw-bold text-dark">
                                    Informasi
                                </p>
                                <p class="fw-semi-bold text-dark">
                                    Jadwal sidang tesis belum tersedia!
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
        <?php } ?>   
    </div>
    <!-- END CONTENT -->
</main>