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

                        <form action="<?php echo base_url('berkassidangtesis'); ?>" method="post" id="form_utama">
                            <div class="row mb-3">
                                <div class="col-md-4 col-sm-12 col-12 mb-2">
                                    <select name="status_berkas_sidang_tesis" id="status_berkas_sidang_tesis" class="form-control select2" style="width:100%;">
                                        <option value="all">- PILIH STATUS PENGAJUAN BERKAS -</option>
                                        <option value="6" <?php echo ($this->session->userdata('status_berkas_sidang_tesis') == 6 ? 'selected' : '');?>>MENUNGGU VERIFIKASI</option>
                                        <option value="7" <?php echo ($this->session->userdata('status_berkas_sidang_tesis') == 7 ? 'selected' : '');?>>BERKAS DITOLAK</option>
                                        <option value="8" <?php echo ($this->session->userdata('status_berkas_sidang_tesis') == 8 ? 'selected' : '');?>>BERKAS DISETUJUI</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 mb-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_berkas_sidang_tesis" id="search_berkas_sidang_tesis" value="<?php echo $this->session->userdata('search_berkas_sidang_tesis');?>" placeholder="Masukkan Pencarian" autocomplete="off" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                                
                                                <?php if($this->session->userdata('search_berkas_sidang_tesis')) {?>
                                                    <button class="btn btn-dark" type="submit" name="reset_search_berkas_sidang_tesis" value="1" onclick="$('#search_berkas_sidang_tesis').val('')">
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
                                        <th class="text-center">Form Revisi</th>
                                        <th class="text-center">Laporan Final Tesis</th>
                                        <th class="text-center">Form Penilaian Akhir</th>
                                        <th class="text-center">Form Ket. Ikut Sidang</th>
                                        <th class="text-center" style="width:120px;">Dosen Penguji I</th>
                                        <th class="text-center" style="width:120px;">Dosen Penguji II</th>
                                        <th class="text-center" style="width:120px;">Dosen Penguji III</th>
                                        <th class="text-center" style="width:120px;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($pengajuan)
                                        {
                                            foreach($pengajuan as $row_pengajuan)
                                            {
                                                $nomor++;
                                                echo '<tr style="vertical-align:top;">
                                                        <td class="text-center" style="width:50px;">
                                                            '.$nomor.'
                                                        </td>
                                                        <td style="width:90px;">
                                                            <a href="'.base_url('berkassidangtesis/viewDetailBerkas/' . encode($row_pengajuan->id_pengajuan)).'" title="KLIK UNTUK MELIHAT DETAIL PENGAJUAN">
                                                                '.$row_pengajuan->nrp.'
                                                            </a>
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_pengajuan->nama_mahasiswa.'
                                                        </td>
                                                        <td>
                                                            '.$row_pengajuan->judul_tesis.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_pengajuan->dosbing1.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_pengajuan->dosbing2.'
                                                        </td>
                                                        <td style="width:70px;" class="text-center">';
                                                            
                                                            if($row_pengajuan->form_revisi)
                                                            {
                                                                echo '<a target="_blank" class="btn-sm btn btn-dark" href="'.base_url('uploads/berkassidangtesis/' . $row_pengajuan->form_revisi).'" title="Download Form Bimbingan I">
                                                                        <i class="fas fa-file-download"></i>
                                                                    </a>';
                                                            }
                                                            else 
                                                            {
                                                                echo '-';
                                                            }

                                                    echo '</td>
                                                        <td style="width:70px;" class="text-center">';
                                                            
                                                            if($row_pengajuan->laporan_final)
                                                            {
                                                                echo '<a target="_blank" class="btn-sm btn btn-dark" href="'.base_url('uploads/berkassidangtesis/' . $row_pengajuan->laporan_final).'" title="Download Form Bimbingan II">
                                                                        <i class="fas fa-file-download"></i>
                                                                    </a>';
                                                            }
                                                            else 
                                                            {
                                                                echo '-';
                                                            }

                                                    echo '</td>
                                                        <td style="width:70px;" class="text-center">';
                                                            
                                                            if($row_pengajuan->form_nilai_akhir)
                                                            {
                                                                echo '<a target="_blank" class="btn-sm btn btn-info text-white" href="'.base_url('uploads/berkassidangtesis/' . $row_pengajuan->form_nilai_akhir).'" title="Download Form Persetujuan">
                                                                        <i class="fas fa-file-download"></i>
                                                                    </a>';
                                                            }
                                                            else 
                                                            {
                                                                echo '-';
                                                            }

                                                    echo '</td>
                                                        <td style="width:70px;" class="text-center">';
                                                            
                                                            if($row_pengajuan->form_ket_ikut_sidang)
                                                            {
                                                                echo '<a target="_blank" class="btn-sm btn btn-info text-white" href="'.base_url('uploads/berkassidangtesis/' . $row_pengajuan->form_ket_ikut_sidang).'" title="Download Berita Acara">
                                                                        <i class="fas fa-file-download"></i>
                                                                    </a>';
                                                            }
                                                            else 
                                                            {
                                                                echo '-';
                                                            }

                                                    echo '</td>
                                                        <td style="width:120px;">
                                                            '.$row_pengajuan->penguji1.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_pengajuan->penguji2.'
                                                        </td>
                                                        <td style="width:120px;">
                                                            '.$row_pengajuan->penguji3.'
                                                        </td>
                                                        <td class="text-center" style="width:100px;">';

                                                            if($row_pengajuan->status == 6)
                                                            {
                                                                echo '<button type="button" data-url="'.base_url('berkassidangtesis/acceptBerkas/' . encode($row_pengajuan->id_pengajuan)).'" class="btn btn-sm btn-success btn-accept" title="Pendaftaran Telah Sesuai">
                                                                        <i class="fas fa-check"></i>
                                                                    </button>
                                                                    <button type="button" data-url="'.base_url('berkassidangtesis/rejectBerkas/' . encode($row_pengajuan->id_pengajuan)).'" class="btn btn-sm btn-danger btn-reject" title="Pendaftaran Tidak Sesuai">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>';
                                                            }
                                                            else if($row_pengajuan->status == 7)
                                                            {
                                                                echo '<div class="text-center text-danger fw-bolder">
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                                        </div>
                                                                        BERKAS DITOLAK
                                                                    </div>';
                                                            }
                                                            else if($row_pengajuan->status >= 8)
                                                            {
                                                                echo '<div class="text-center text-success fw-bolder">
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                                        </div>
                                                                        BERKAS DISETUJUI
                                                                    </div>';
                                                            }
                                                            
                                                    echo '</td>
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
<style type="text/css">
    .table > :not(caption) > * > *, 
    .dataTable-table > :not(caption) > * > *{
        font-size: 11px;
        padding: 10px;
    }
</style>
<script>
    $(document).on("change", "#status_berkas_sidang_tesis", function() {
        $('#form_utama').submit();
    });

    $(document).on("click", ".btn-accept", function() {
        var get_url = $(this).data('url');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data berkas pendaftar akan disetujui!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#73879C',
            confirmButtonText: 'Ya, Setujui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = get_url;
            }
        });
    });

    $(document).on("click", ".btn-reject", function() {
        var get_url = $(this).data('url');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data berkas pendaftar akan ditolak!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#73879C',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = get_url;
            }
        });
    });
</script>