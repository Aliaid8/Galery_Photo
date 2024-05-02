<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="<?= base_url()?>assets/css/styles.css" />
        <link rel="stylesheet" href="<?= base_url()?>assets/icon/css/fontawesome.css"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/icon/css/brands.css"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/icon/css/solid.css"/>
        <link rel="stylesheet" href="<?= base_url()?>assets/icon/css/regular.css"/>
        <style>

            body {
                background-color: ;
            }
            header {
                background-image: url("assets/img/kamera.jpg");
            }

            header .container h1 {
                opacity: .7;
            }

            footer a {
                text-decoration: none;
            }

            .card {
                overflow: hidden;
            }

        </style>
    </head> 
    <body> 

        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url()?>">Gin <i class="fa-brands fa-paypal text-danger"></i>hotographer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-large me-1 text-danger"></i> Gigin Septiar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= site_url() ?>auth/admin"><i class="fa-solid fa-envelope me-1 text-primary"></i></a></li>
                                <li><a class="dropdown-item" href="<?= base_url("auth/logout"); ?>"><i class="fa-solid fa-right-from-bracket me-1 text-danger"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light mb-4 mt-5 shadow-lg">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder text-light"> My Gallery hoto!</h1>
                    <p class="lead mb-0 text-danger">I am a professional photographer, join us for collaboration!</p>
                </div>
            </div>
        </header>

        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="#!">
        
                            </a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <p class="mt-1 ms-2">
                                    <i class="fa-regular fa-heart"></i> 10
                                    <i class="fa-regular fa-comment ms-2"></i> 9
                                </p>
                                <h2 class="card-title">p</h2>
                                <p class="card-text">p</p>       
                            </div>
                        </div>

                    <!-- Nested row for non-featured blog posts-->
                    <?php foreach ($data as $d) : ?>
                    <div class="row">
                        <div class="col-lg-6 ">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img src="<?= base_url('assets/img/') . $d->lokasi_file; ?>" alt="gambar" width="400"
                                        title="<?= $d->judul_foto; ?>"></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?= $d->tanggal_unggah; ?></div>
                                        <p class="mt-1 ms-2">
                                            <i class="fa-regular fa-heart"></i> 10
                                            <i class="fa-regular fa-comment ms-2"></i> 9
                                        </p>
                                    <h2 class="card-title h4"><?= $d->judul_foto; ?></h2>
                                    <p class="card-text"><?= $d->deskripsi_foto; ?></p>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Side widgets -->
                <div class="col-lg-4">
                    <!-- Search -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <i class="fa-solid fa-magnifying-glass me-1 text-danger"></i>Search
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control  border-danger" type="text" placeholder="Search images..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-danger ms-1" id="button-search" type="button">Search</button>
                            </div>
                        </div>
                    </div>

                    <!-- Upload -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header"><i class="fa-solid fa-camera me-1 text-primary"></i> Upload Photos</div>
                        <?= $this->session->flashdata('message'); ?>
                            <div class="card-body">
                            <?= form_open_multipart('post/upload') ?>
                                <div class="input-group">
                                    <input type="file" name="lokasi_file" class="form-control border-primary" accept="image/*" id="upload" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-primary ms-1" type="submit" name="upload" id="upload">Upload</button>
                                </div>
                                <div class="form-floating mb-2 mt-3">
                                    <textarea class="form-control" name="judul_foto" placeholder="Leave a comment here" id="title" required></textarea>
                                    <label for="title">Tittle</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="deskripsi_foto" placeholder="Leave a comment here" id="deskripsi" style="height: 100px" required></textarea>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                            <?= form_close() ?>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="py-4 bg-dark border-top border-primary">
            <div class="row text-light text-center">
                <div class="col">
                    <p class="fs-5 fw-light">My social media</p>
                </div>
            </div>
            <div class="row text-light text-center">
                <div class="col">
                    <a class="m-2" href="https://instagram.com/ginrpl?igshid=MzNlNGNkZWQ4Mg==" target="_blank"><i class="fa-brands fa-square-instagram"></i> Instagram</a>
                    <a class="m-2" href="https://www.facebook.com/finger.finger.5283" target="_blank"><i class="fa-brands fa-square-facebook"></i> Facebook</a>
                    <a class="m-2" href=""><i class="fa-brands fa-twitter"></i> Twitter</a>
                    <a class="m-2" href="https://youtube.com/@ginrpl" target="_blank"><i class="fa-brands fa-youtube"></i> Youtube</a>
                </div> 
            </div>
            <div class="row mt-5 mb-0">
                <div class="col">
                    <p class="text-center text-light fw-light">Copyright &copy; Gin <i class="fa-brands fa-paypal text-danger"></i>hotographer</p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
