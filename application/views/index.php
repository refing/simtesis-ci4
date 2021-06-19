<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIM TESIS</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/favicon.ico')?>"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet" />
    </head>
    <body class="bg-white">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href='<?php echo base_url('/')?>'>SIM TESIS</a>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-left mt-5">
                <h1>SIM TESIS</h1>
                <h2>Pascasarjana Departemen Sistem Informasi</h2>
                <h3>Institut Teknologi Sepuluh Nopember</h3>
                
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
                <div class="col-cg-5">
                    <a class="btn btn-primary" href="<?= site_url('login') ?>">Login</a>
                    <a class="btn btn-primary" href="<?= site_url('register') ?>">Daftar</a>
                </div>
            </div>
                
            <a class="btn btn-primary" href="<?= site_url('dashboard') ?>">dashboard (ntar diapus)</a>

            <footer>
                <div class="text-center mt-5">
                    <p>Copyright 2021</p>
                </div>
            </footer>
        </div>
        
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
