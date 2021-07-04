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
                                <label class="col-md-3" for="kode_ruangan">Kode Ruangan</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="kode_ruangan" id="kode_ruangan" value="<?php echo set_value('kode_ruangan');?>">
                                    <?php echo form_error('kode_ruangan', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="nama_ruangan">Nama Ruangan</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="nama_ruangan" id="nama_ruangan" value="<?php echo set_value('nama_ruangan');?>">
                                    <?php echo form_error('nama_ruangan', '<span class="text-danger text-error">', '</span>');?>
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
                                    <a href="<?php echo base_url('ruangan');?>" class="btn btn-dark">
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