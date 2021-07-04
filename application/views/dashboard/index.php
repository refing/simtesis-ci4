<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Selamat Datang, <?php echo $this->session->userdata('user_logged')->nama ?></h1>
        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Anda belum melakukan pendaftaran seminar proposal</li> -->
        </ol>

        <?php if ($this->session->userdata('user_logged')->role == 'mahasiswa'): ?>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Seminar Proposal</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Daftar</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Sidang Tesis</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('pendaftaransidangtesis');?>">Daftar</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Yudisium</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Daftar</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>