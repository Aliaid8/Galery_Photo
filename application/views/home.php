          <!-- Page header with logo and tagline-->
          <header class="py-5 bg-secondary mb-4 mt-5 border-bottom">
            <div class="container">
                <div class="text-center my-5 btn-light">
                    <h1 class="fw-bolder text-dark">My Gallery Photo!</h1>
                    <p class="lead mb-0 text-dark">Let's Wander with Art Creators!</p>
                </div>
            </div>
            </div>
        </header>

        <!DOCTYPE html>
<html>
<head>
<style>
body {
  background-image: url('https://th.bing.com/th/id/OIP.MU0cIzakEq-CIHiU1IgTiQHaEo?w=255&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7');
}
</style>
</head>
<body>

        <!-- Page content-->
        <div class="container">
            <div class="row" id="home">
                <!-- Blog entries-->
                <div class="col-lg-8 ">  
                    <div class="row">
                        <div class="col-lg-6 ">
                            <!-- Postingan-->
                            <?php foreach ($data as $d) : ?>
                            <div class="card mb-4 ">
                                <a href="#!"><img src="<?= base_url('assets/img/') . $d->lokasi_file; ?>" alt="gambar" width="500 "
                                    title="<?= $d->judul_foto; ?>">
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted">
                                        <i class="fas fa-fw fa-user me-1"></i><?= $user["username"]; ?> - <?= $d->tanggal_unggah; ?>
                                    </div>
                                        <p class="mt-1">
                                           <i class="fa-regular bt-danger fa-fw fa-heart"></i></a> 45
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d->foto_id; ?>"><i class="fa-regular fa-fw fa-comment ms-2"></a></i> 3
                                        </p>
                                        <h2 class="card-title h4"><?= $d->judul_foto; ?></h2>
                                    <p class="card-text"><?= $d->deskripsi_foto; ?></p>  
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>    
                </div>

                <!-- Modal Komentar -->
                <?php foreach ($data as $d) : ?>
                    <div class="modal fade" id="exampleModal<?= $d->foto_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-comment me-2"></i>Komentar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body position-">
                                <p><?= $d->deskripsi_foto; ?></p>
                                    <div class="card">
                                    <img src="<?= base_url('assets/img/') . $d->lokasi_file; ?>" alt="gambar" width=""
                                    title="<?= $d->judul_foto; ?>">
                                                
                                </div>
                                <div class="container">
                                    
                                    <p class="small"><i class="fas fa-user me-2"></i><?= $user["username"]; ?> wah menajubkan</p>
                                    <p class="small"><i class="fas fa-user me-2"></i><?= $user["username"]; ?> indah sekali curugnya</p>
                                    <p class="small"><i class="fas fa-user me-2"></i><?= $user["username"]; ?> harus diperbaiki lagi nih akses jalannya</p>
                                </div>   
                                <?= form_open_multipart('post/komentar') ?>
                                <div class="input-group">
                                    <input type="text" name="isi_komentar" class="form-control" placeholder="Tulis Komentar..." aria-describedby="button-addon2" autocomplete="off" required>
                                    <button type="submit" class="btn btn-primary ms-1" type="button" id="button-addon2">Send</button>
                                </div>
                                <?= form_close() ?> 
                            </div>
                        </div>    
                    </div>  
                </div>
                <?php endforeach; ?>

                <!-- Side widgets -->
                <div class="col-lg-4" id="upload">
                    <!-- Search -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header">
                            <i class="fa-solid fa-magnifying-glass me-1 text-danger"></i>Search
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control  border-danger" type="text" placeholder="Search images..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-warning" id="button-search" type="button">Search</button>
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
                                    <input type="file" name="lokasi_file" class="form-control" accept="image/*" id="upload" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-info" type="submit" name="upload" id="upload">Upload</button>
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
