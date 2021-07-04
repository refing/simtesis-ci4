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

                        <form action="<?php echo base_url('nilaisidangtesis'); ?>" method="post" id="form_utama">
                            <div class="row mb-3">
                                
                                <?php if ($this->session->userdata('user_logged')->role != 'mahasiswa'): ?>

                                    <div class="col-md-2 col-sm-6 col-12">
                                        <a href="<?php echo base_url('nilaisidangtesis/createNilai');?>" class="btn btn-primary mb-3" title="Tambah Data">
                                            <i class="fas fa-plus"></i> Tambah
                                        </a>
                                    </div>

                                <?php endif;?>

                                <div class="col-md-4 col-sm-12 col-12">                            
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_nilai" id="search_nilai" value="<?php echo $this->session->userdata('search_nilai');?>" placeholder="Masukkan Pencarian" autocomplete="off" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                                
                                                <?php if($this->session->userdata('search_nilai')) {?>
                                                    <button class="btn btn-dark" type="submit" name="reset_search_nilai" value="1" onclick="$('#search_nilai').val('')">
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
                                    <tr class="bg-secondary text-white" style="vertical-align:middle;">
                                        <th class="text-center" style="width:50px;">No</th>
                                        <th class="text-center" style="width:90px;">NRP</th>
                                        <th class="text-center" style="width:120px;">Nama Mahasiswa</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center" style="width:120px;">Dosen Pembimbing I</th>
                                        <th class="text-center" style="width:120px;">Dosen Pembimbing II</th>
                                        <th class="text-center" style="width:120px;">Dosen Penguji I</th>
                                        <th class="text-center" style="width:120px;">Dosen Penguji II</th>
                                        <th class="text-center" style="width:120px;">Dosen Penguji II</th>
                                        <th class="text-center" style="width:120px;">Nilai</th>
                                        <th class="text-center" style="width:120px;">Status</th>
                                        
                                        <?php if (@$this->session->userdata('user_logged')->role != 'mahasiswa'): ?>
                                            
                                            <th class="text-center" style="width:100px;">Opsi</th>

                                        <?php endif;?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($nilai)
                                        {
                                            foreach($nilai as $row_nilai)
                                            {
                                                $nomor++;
                                                echo '<tr style="vertical-align:top;">
                                                        <td class="text-center" style="width:50px;">
                                                            '.$nomor.'
                                                        </td>
                                                        <td style="width:90px;">
                                                            <a href="'.base_url('nilaisidangtesis/viewDetailNilai/' . encode($row_nilai->id_nilai)).'" title="KLIK UNTUK MELIHAT DETAIL PENGAJUAN">
                                                                '.$row_nilai->nrp.'
                                                            </a>
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_nilai->nama_mahasiswa.'
                                                        </td>
                                                        <td>
                                                            '.$row_nilai->judul_tesis.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_nilai->dosbing1.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_nilai->dosbing2.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_nilai->penguji1.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_nilai->penguji2.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_nilai->penguji3.'
                                                        </td>
                                                        <td style="width:120px;" class="text-center">
                                                            '.$row_nilai->nilai.'
                                                        </td>
                                                        <td style="width:120px;" class="text-center">';
                                                          
                                                          if($row_nilai->status_finalthesis == 'LULUS')
                                                          {
                                                            echo '<strong class="text-success">
                                                                    ' . $row_nilai->status_finalthesis . '
                                                                </strong>';
                                                          } 
                                                          else if($row_nilai->status_finalthesis == 'TIDAK LULUS')
                                                          {
                                                            echo '<strong class="text-danger">
                                                                    ' . $row_nilai->status_finalthesis . '
                                                                </strong>';
                                                          } 
                                                          else 
                                                          {
                                                            echo '-';
                                                          }
                                                    echo '</td>';

                                                        if (@$this->session->userdata('user_logged')->role != 'mahasiswa'):

                                                            echo '<td class="text-center" style="width:100px;">
                                                                    <a href="'.base_url('nilaisidangtesis/updateNilai/' . encode($row_nilai->id_nilai)).'" class="btn btn-sm btn-warning" title="Ubah Data">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <button type="button" data-url="'.base_url('nilaisidangtesis/deleteNilai/' . encode($row_nilai->id_nilai)).'" class="btn btn-sm btn-danger btn-hapus" title="Hapus Data">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </td>';
                                                        endif;

                                                echo '</tr>';
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
<style type="text/css">
    .table > :not(caption) > * > *, 
    .dataTable-table > :not(caption) > * > *{
        font-size: 11px;
        padding: 10px;
    }
</style>
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