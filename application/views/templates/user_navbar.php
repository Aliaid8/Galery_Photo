<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="<?= base_url()?>">Gallery <i class="fa-brands fa-paypal text-danger"></i>hoto</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"><i class="fas fa-fw fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#upload"><i class="fas fa-fw fa-upload"></i> Upload Fhotos</a>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse me-3" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user-large me-1 text-danger"></i> <?= $user['username']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?= site_url() ?>auth/admin"><i class="fa-solid fa-envelope me-1 text-primary"></i> <?= $user['email']; ?></a></li>
                                    <li><a class="dropdown-item" href="<?= base_url("auth/logout"); ?>"><i class="fa-solid fa-right-from-bracket me-1 text-danger"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>