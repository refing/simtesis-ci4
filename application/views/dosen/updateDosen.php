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
                                <label class="col-md-3" for="nip_dosen">NIP</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="nip_dosen" id="nip_dosen" value="<?php echo (set_value('nip_dosen') ? set_value('nip_dosen') : $ubah->nip_dosen);?>">
                                    <?php echo form_error('nip_dosen', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="nama_dosen">Nama Dosen</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="nama_dosen" id="nama_dosen" value="<?php echo (set_value('nama_dosen') ? set_value('nama_dosen') : $ubah->nama_dosen);?>">
                                    <?php echo form_error('nama_dosen', '<span class="text-danger text-error">', '</span>');?>
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
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                    <a href="<?php echo base_url('dosen');?>" class="btn btn-dark">
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