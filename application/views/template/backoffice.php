<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Dashboard - SIM TESIS</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/sweetalert2.min.css')?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/select2.min.css')?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/daterangepicker.css')?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <?php $this->load->view("template/headernav.php") ?>
        
        <div id="layoutSidenav">
        
            <?php $this->load->view("template/sidenav.php") ?>

            <div id="layoutSidenav_content">

                <?php $this->load->view($contents);?>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/demo/chart-area-demo.js')?>"></script>
        <script src="<?php echo base_url('assets/demo/chart-bar-demo.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/datatables-simple-demo.js')?>"></script>
        <script src="<?php echo base_url('assets/js/sweetalert2.all.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/select2.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/moment.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/daterangepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js')?>"></script>
        <script>
            $(document).ready(function() {

                /*
                |--------------------------------------------------------------------------
                | INPUTAN HANYA ANGKA, TERMASUK DESIMAL
                |--------------------------------------------------------------------------
                |*/
                 $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
                    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
                });
                
                /*
                |--------------------------------------------------------------------------
                | SELECT2
                |--------------------------------------------------------------------------
                |*/
                $(".select2").select2();

                /*
                |--------------------------------------------------------------------------
                | NOTIFIKASI
                |--------------------------------------------------------------------------
                |*/
                <?php if($this->session->flashdata('success')):?>
                    Swal.fire('Sukses!', '<?php echo $this->session->flashdata('success'); ?>', 'success');
                <?php endif;?>
                
                <?php if($this->session->flashdata('warning')):?>
                    Swal.fire('Mohon Maaf!', '<?php echo $this->session->flashdata('warning'); ?>', 'warning');
                <?php endif;?>
                
                <?php if($this->session->flashdata('danger')):?>
                    Swal.fire('Error!', '<?php echo $this->session->flashdata('danger'); ?>', 'danger');
                <?php endif;?>
            });
        </script>
    </body>
</html>
