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
                                <label class="col-md-3" for="id_pengajuan">Nama Mahasiswa</label>
                                <div class="col-md-9">
                                    <select name="id_pengajuan" id="id_pengajuan" class="form-control select2" style="width:100%;" onchange="viewDetailPengajuan()">
                                        <option value="">- PILIH NAMA MAHASISWA -</option>
                                        <?php
                                            if($pengajuan)
                                            {
                                                foreach($pengajuan as $row_pengajuan)
                                                {
                                                    $selected = ($row_pengajuan->id_pengajuan == set_value('id_pengajuan') ? 'selected' : '');
                                                    echo '<option value="'.$row_pengajuan->id_pengajuan.'" '.$selected.'>'.$row_pengajuan->nama_mahasiswa.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>       
                                    <?php echo form_error('id_pengajuan', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="nrp">NRP</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="nrp" id="nrp" value="<?php echo set_value('nrp');?>" readonly>
                                    <?php echo form_error('nrp', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="judul_tesis">Judul</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="judul_tesis" id="judul_tesis" value="<?php echo set_value('judul_tesis');?>" readonly>
                                    <?php echo form_error('judul_tesis', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="nrp">Dosbing I</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="dosbing1" id="dosbing1" value="<?php echo set_value('dosbing1');?>" readonly>
                                    <?php echo form_error('dosbing1', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="dosbing2">Dosbing II</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="dosbing2" id="dosbing2" value="<?php echo set_value('dosbing2');?>" readonly>
                                    <?php echo form_error('dosbing2', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="id_ruangan">Ruangan</label>
                                <div class="col-md-9">
                                    <select name="id_ruangan" id="id_ruangan" class="form-control select2" style="width:100%;">
                                        <option value="">- PILIH RUANGAN -</option>
                                        <?php
                                        if($ruangan)
                                        {
                                            foreach($ruangan as $row_ruangan)
                                            {
                                                $selected = (set_value('id_ruangan') == $row_ruangan->id_ruangan ? 'selected' : '');
                                                echo '<option value="'.$row_ruangan->id_ruangan.'" '.$selected.'>'.$row_ruangan->kode_ruangan.' - '.$row_ruangan->nama_ruangan.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('id_ruangan', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="jadwal_sidang">Tanggal Sidang</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input onkeydown="event.preventDefault()" type="text" class="form-control" name="jadwal_sidang" id="jadwal_sidang" value="<?php echo set_value('jadwal_sidang');?>">
                                        <span class="input-group-text input-group-jadwal-sidang"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <?php echo form_error('jadwal_sidang', '<span class="text-danger text-error">', '</span>');?>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3" for="jam_sidang">Waktu Sidang</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input onkeydown="event.preventDefault()" type="text" class="form-control" name="jam_sidang" id="jam_sidang" value="<?php echo (set_value('jam_sidang') ? set_value('jam_sidang') : '09:00');?>">
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
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
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
<script>
    $(document).ready(function() {
        $(document).on("click",".input-group-jadwal-sidang",function() {
            $('#jadwal_sidang').focus();
        });

        $('#jadwal_sidang').daterangepicker({
            minDate: new Date(),
            singleDatePicker: true,
            showDropdowns: true,
            todayHighlight: true,
            autoclose: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $(document).on("click",".input-group-jam-sidang",function() {
            $('#jam_sidang').focus();
        });

        $('#jam_sidang').daterangepicker({
            singleDatePicker: true,
            timePicker : true,
            timePicker24Hour : true,
            timePicker:true,
            autoclose: true,
            timePickerIncrement: 1,
            timePickerSeconds: false,
            locale: {
                format: 'hh:mm'
            }
        }).on('show.daterangepicker', function(ev, picker) {
            picker.container.find(".calendar-table").hide();
       });
    });

    function viewDetailPengajuan()
    {
        var id_pengajuan = $("#id_pengajuan").val();
        $.ajax({
            url : "<?php echo base_url('jadwalsidangtesis/viewDetailPengajuan');?>",
            type: 'GET',
            data : 'id_pengajuan=' + id_pengajuan,
            dataType: 'json',
        }).done(function(response){
            if(response.status)
            {
                $("#nama_mahasiswa").val(response.nama_mahasiswa);
                $("#nrp").val(response.nrp);
                $("#email").val(response.email);
                $("#judul_tesis").val(response.judul_tesis);
                $("#dosbing1").val(response.dosbing1);
                $("#dosbing2").val(response.dosbing2);
            }
            else
            {
                $("#nama_mahasiswa").val('');
                $("#nrp").val('');
                $("#email").val('');
                $("#judul_tesis").val('');
                $("#dosbing1").val('');
                $("#dosbing2").val('');
            }
        });
    }
</script>