<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">

        <?php if ($this->session->userdata('user_logged')->role == 'mahasiswa'): ?>
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>-->
                    <div class="sb-sidenav-menu-heading">Menu</div> 
                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('pendaftaransempro', 'pendaftaransidangtesis', 'pendaftaranyudisium')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDaftar" aria-expanded="false" aria-controls="collapseDaftar">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Pendaftaran
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('pendaftaransempro', 'pendaftaransidangtesis', 'pendaftaranyudisium')) ? 'show' : ''); ?>" id="collapseDaftar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'pendaftaransempro' ? 'active' : ''); ?>" href="<?php echo base_url('pendaftaransempro') ?>">Pendaftaran Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'pendaftaransidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('pendaftaransidangtesis') ?>">Pendaftaran Sidang Tesis</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'pendaftaranyudisium' ? 'active' : ''); ?>" href="<?php echo base_url('pendaftaranyudisium') ?>">Pendaftaran Yudisium</a>
                        </nav>
                    </div>


                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('datadirisempro', 'datadirisidangtesis', 'datadiriyudisium')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseData" aria-expanded="false" aria-controls="collapseData">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Data Diri
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('datadirisempro', 'datadirisidangtesis', 'datadiriyudisium')) ? 'show' : ''); ?>" id="collapseData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'datadirisempro' ? 'active' : ''); ?>" href="<?php echo base_url('datadirisempro') ?>">Data Diri Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'datadirisidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('datadirisidangtesis') ?>">Data Diri Sidang Tesis</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'datadiriyudisium' ? 'active' : ''); ?>" href="<?php echo base_url('datadiriyudisium') ?>">Data Diri Yudisium</a>
                        </nav>
                    </div>


                    <a class="nav-link <?php echo (in_array($this->uri->segment(1), array('jadwalsempro', 'jadwalsidangtesis')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Jadwal
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('jadwalsempro', 'jadwalsidangtesis')) ? 'show' : ''); ?>" id="collapseJadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'jadwalsempro' ? 'active' : ''); ?>" href="<?php base_url('jadwalsempro') ?>">Jadwal Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'jadwalsidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('jadwalsidangtesis') ?>">Jadwal Sidang Tesis</a>
                        </nav>
                    </div>


                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('berkassempro', 'berkassidangtesis')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerkas" aria-expanded="false" aria-controls="collapseBerkas">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Berkas & Lap Final
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('berkassempro', 'berkassidangtesis')) ? 'show' : ''); ?>" id="collapseBerkas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'berkassempro' ? 'active' : ''); ?>" href="<?php echo base_url('berkassempro') ?>">Berkas Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'berkassidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('berkassidangtesis') ?>">Berkas Sidang Tesis</a>
                        </nav>
                    </div>


                    <a class="nav-link <?php echo (in_array($this->uri->segment(1), array('nilaisempro', 'nilaisidangtesis', 'nilaiyudisium')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNilai" aria-expanded="false" aria-controls="collapseNilai">
                        <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                        Nilai & Status
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('nilaisempro', 'nilaisidangtesis', 'nilaiyudisium')) ? 'show' : ''); ?>" id="collapseNilai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'nilaisempro' ? 'active' : ''); ?>" href="<?= site_url('nilaisempro') ?>">Nilai Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'nilaisidangtesis' ? 'active' : ''); ?>" href="<?= site_url('nilaisidangtesis') ?>">Nilai Sidang Tesis</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'nilaiyudisium' ? 'active' : ''); ?>" href="<?= site_url('nilaiyudisium') ?>">Status Yudisium</a>
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
                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('pendaftarsempro', 'pendaftarsidangtesis', 'pendaftaryudisium')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDaftar" aria-expanded="false" aria-controls="collapseDaftar">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Pendaftar
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('pendaftarsempro', 'pendaftarsidangtesis', 'pendaftaryudisium')) ? 'show' : ''); ?>" id="collapseDaftar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'pendaftarsempro' ? 'active' : ''); ?>" href="<?php echo base_url('pendaftarsempro') ?>">Pendaftar Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'pendaftarsidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('pendaftarsidangtesis') ?>">Pendaftar Sidang Tesis</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'pendaftaryudisium' ? 'active' : ''); ?>" href="<?php echo base_url('pendaftaranyudisium') ?>">Pendaftar Yudisium</a>
                        </nav>
                    </div>
                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('jadwalsempro', 'jadwalsidangtesis')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal" aria-expanded="false" aria-controls="collapseJadwal">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Jadwal
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('jadwalsempro', 'jadwalsidangtesis')) ? 'show' : ''); ?>" id="collapseJadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'jadwalsempro' ? 'active' : ''); ?>" href="<?php echo base_url('jadwalsempro') ?>">Jadwal Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'jadwalsidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('jadwalsidangtesis') ?>">Jadwal Sidang Tesis</a>
                        </nav>
                    </div>

                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('berkassempro', 'berkassidangtesis')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerkas" aria-expanded="false" aria-controls="collapseBerkas">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Berkas & Lap Final
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('berkassempro', 'berkassidangtesis')) ? 'show' : ''); ?>" id="collapseBerkas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'berkassempro' ? 'active' : ''); ?>" href="<?php echo base_url('berkassempro') ?>">Berkas Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'berkassidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('berkassidangtesis') ?>">Berkas Sidang Tesis</a>
                        </nav>
                    </div>
                    
                    <a class="nav-link  <?php echo (in_array($this->uri->segment(1), array('nilaisempro', 'nilaisidangtesis', 'nilaiyudisium')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNilai" aria-expanded="false" aria-controls="collapseNilai">
                        <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                        Nilai & Status
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('nilaisempro', 'nilaisidangtesis', 'nilaiyudisium')) ? 'show' : ''); ?>" id="collapseNilai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'nilaisempro' ? 'active' : ''); ?>" href="<?php echo base_url('nilaisempro') ?>">Nilai Seminar Proposal</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'nilaisidangtesis' ? 'active' : ''); ?>" href="<?php echo base_url('nilaisidangtesis') ?>">Nilai Sidang Tesis</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'nilaiyudisium' ? 'active' : ''); ?>" href="<?php echo base_url('nilaiyudisium') ?>">Status Yudisium</a>
                        </nav>
                    </div>


                    <a class="nav-link <?php echo (in_array($this->uri->segment(1), array('dosen', 'ruangan')) ? 'active' : 'collapsed'); ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMaster" aria-expanded="false" aria-controls="collapseNilai">
                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                        Master Data
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php echo (in_array($this->uri->segment(1), array('dosen', 'ruangan')) ? 'show' : ''); ?>" id="collapseMaster" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'dosen' ? 'active' : ''); ?>" href="<?php echo base_url('dosen'); ?>">Dosen</a>
                            <a class="nav-link <?php echo ($this->uri->segment(1) == 'ruangan' ? 'active' : ''); ?>" href="<?php echo base_url('ruangan'); ?>">Ruangan</a>
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