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

                        <form action="<?php echo base_url('jadwalsidangtesis'); ?>" method="post" id="form_utama">
                            <div class="row mb-3">
                                
                                <?php if ($this->session->userdata('user_logged')->role != 'mahasiswa'): ?>

                                    <div class="col-md-2 col-sm-6 col-12">
                                        <a href="<?php echo base_url('jadwalsidangtesis/createJadwal');?>" class="btn btn-primary mb-3" title="Tambah Data">
                                            <i class="fas fa-plus"></i> Tambah
                                        </a>
                                    </div>

                                <?php endif;?>

                                <div class="col-md-4 col-sm-12 col-12">                            
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_jadwal" id="search_jadwal" value="<?php echo $this->session->userdata('search_jadwal');?>" placeholder="Masukkan Pencarian" autocomplete="off" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                                
                                                <?php if($this->session->userdata('search_jadwal')) {?>
                                                    <button class="btn btn-dark" type="submit" name="reset_search_jadwal" value="1" onclick="$('#search_jadwal').val('')">
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
                                        <th class="text-center" style="width:120px;">Waktu</th>
                                        <th class="text-center" style="width:120px;">Ruangan</th>
                                        
                                        <?php if (@$this->session->userdata('user_logged')->role != 'mahasiswa'): ?>
                                            
                                            <th class="text-center" style="width:100px;">Opsi</th>

                                        <?php endif;?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($daftar)
                                        {
                                            foreach($daftar as $row_daftar)
                                            {
                                                $nomor++;
                                                echo '<tr style="vertical-align:top;">
                                                        <td class="text-center" style="width:50px;">
                                                            '.$nomor.'
                                                        </td>
                                                        <td style="width:90px;">
                                                            <a href="'.base_url('jadwalsidangtesis/viewDetailJadwal/' . encode($row_daftar->id_jadwal)).'" title="KLIK UNTUK MELIHAT DETAIL PENGAJUAN">
                                                                '.$row_daftar->nrp.'
                                                            </a>
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->nama_mahasiswa.'
                                                        </td>
                                                        <td>
                                                            '.$row_daftar->judul_tesis.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->dosbing1.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->dosbing2.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->penguji1.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->penguji2.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->penguji3.'
                                                        </td>
                                                        <td style="width:120px;" class="text-center">
                                                            '.date('d M Y', strtotime($row_daftar->jadwal_sidang)).'
                                                            <br>
                                                            '.date('H:i', strtotime($row_daftar->jam_sidang)).'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_daftar->nama_ruangan.'
                                                        </td>';

                                                        if (@$this->session->userdata('user_logged')->role != 'mahasiswa'):

                                                            echo '<td class="text-center" style="width:100px;">';

                                                                # KARENA SUDAH DINILAI, MAKA TIDAK BISA DIUBAH / DIHAPUS
                                                                if($row_daftar->status != 9)
                                                                {                                                                    
                                                                    echo '<a href="'.base_url('jadwalsidangtesis/updateJadwal/' . encode($row_daftar->id_jadwal)).'" class="btn btn-sm btn-warning" title="Ubah Data">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>';

                                                                    echo '<button type="button" data-url="'.base_url('jadwalsidangtesis/deleteJadwal/' . encode($row_daftar->id_jadwal)).'" class="btn btn-sm btn-danger btn-hapus" title="Hapus Data">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>';
                                                                }

                                                            echo '</td>';
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