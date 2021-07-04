<main>
    <div class="container-fluid px-4">
        
        <h5 class="mt-4 mb-4"><?php echo $title?></h5>

        <div class="row">
            <div class="col-xl-12">                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-list me-1"></i>
                        <?php echo $title;?>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('ruangan'); ?>" method="post" id="form_utama">
                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-12">
                                    <a href="<?php echo base_url('ruangan/createRuangan');?>" class="btn btn-primary mb-3" title="Tambah Data">
                                        <i class="fas fa-plus"></i> Tambah
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">                            
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_ruangan" id="search_ruangan" value="<?php echo $this->session->userdata('search_ruangan');?>" placeholder="Masukkan Pencarian" autocomplete="off" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                                
                                                <?php if($this->session->userdata('search_ruangan')) {?>
                                                    <button class="btn btn-dark" type="submit" name="reset_search_ruangan" value="1" onclick="$('#search_ruangan').val('')">
                                                        <i class="fa fa-times"></i> Reset
                                                    </button>
                                                <?php } ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr class="bg-secondary text-white">
                                        <th class="text-center" style="width:50px;">No</th>
                                        <th style="width:180px;">Kode Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th class="text-center" style="width:120px;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($ruangan)
                                        {
                                            foreach($ruangan as $row_ruangan)
                                            {
                                                $nomor++;
                                                echo '<tr>
                                                        <td class="text-center" style="width:50px;">'.$nomor.'</td>
                                                        <td style="width:180px;">'.$row_ruangan->kode_ruangan.'</td>
                                                        <td>'.$row_ruangan->nama_ruangan.'</td>
                                                        <td class="text-center" style="width:120px;">
                                                            <a href="'.base_url('ruangan/updateRuangan/' . encode($row_ruangan->id_ruangan)).'" class="btn btn-sm btn-warning" title="Ubah Data">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" data-url="'.base_url('ruangan/deleteRuangan/' . encode($row_ruangan->id_ruangan)).'" class="btn btn-sm btn-danger btn-hapus" title="Hapus Data">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>';
                                            }
                                        }
                                        else 
                                        {
                                            echo '
                                            <tr>
                                                <td colspan="100" class="text-center">Tidak ada data</td>
                                            </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo $pagination;?>
                            </div>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).on("click", ".btn-hapus", function() {
        var get_url = $(this).data('url');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#73879C',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = get_url;
            }
        });
    });
</script>