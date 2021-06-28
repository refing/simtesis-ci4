<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <?php if ($this->session->userdata('user_logged')->role=='mahasiswa'): ?>
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <!-- <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>-->
                                <div class="sb-sidenav-menu-heading">Menu</div> 
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDaftar" aria-expanded="false" aria-controls="collapseDaftar">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Pendaftaran
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseDaftar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('pendaftaransempro') ?>">Pendaftaran Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaransidang') ?>">Pendaftaran Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaranyudisium') ?>">Pendaftaran Yudisium</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseData" aria-expanded="false" aria-controls="collapseData">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Data Diri
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('datadiri') ?>">Data Diri Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('datadiri') ?>">Data Diri Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('datadiri') ?>">Data Diri Yudisium</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                    Jadwal
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseJadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('jadwalsempro') ?>">Jadwal Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('jadwalsidang') ?>">Jadwal Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerkas" aria-expanded="false" aria-controls="collapseBerkas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Berkas & Lap Final
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseBerkas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('berkassempro') ?>">Berkas Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('berkassidang') ?>">Berkas Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNilai" aria-expanded="false" aria-controls="collapseNilai">
                                    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                    Nilai & Status
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseNilai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('nilaisempro') ?>">Nilai Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('nilaisidang') ?>">Nilai Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('nilaiyudisium') ?>">Status Yudisium</a>
                                    </nav>
                                </div>




                            
                            </div>
                        </div>
                    <?php elseif ($this->session->userdata('user_logged')->role=='admin'): ?>
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <!-- <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>-->
                                <div class="sb-sidenav-menu-heading">Menu</div> 
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDaftar" aria-expanded="false" aria-controls="collapseDaftar">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Pendaftaran
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseDaftar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('pendaftaransempro') ?>">Pendaftaran Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaransidang') ?>">Pendaftaran Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('pendaftaranyudisium') ?>">Pendaftaran Yudisium</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                    Jadwal
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseJadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('jadwalsempro') ?>">Jadwal Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('jadwalsidang') ?>">Jadwal Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerkas" aria-expanded="false" aria-controls="collapseBerkas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Berkas & Lap Final
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseBerkas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('berkassempro') ?>">Berkas Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('berkassidang') ?>">Berkas Sidang Tesis</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNilai" aria-expanded="false" aria-controls="collapseNilai">
                                    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                    Nilai & Status
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseNilai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= site_url('nilaisempro') ?>">Nilai Seminar Proposal</a>
                                        <a class="nav-link" href="<?= site_url('nilaisidang') ?>">Nilai Sidang Tesis</a>
                                        <a class="nav-link" href="<?= site_url('nilaiyudisium') ?>">Status Yudisium</a>
                                    </nav>
                                </div>




                            
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $this->session->userdata('user_logged')->nama ?>
                    </div> -->
                </nav>
            </div>