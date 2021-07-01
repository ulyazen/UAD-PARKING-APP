<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Parkir UAD</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link text-white" href=<?= base_url('app'); ?>>Home</a>
                    <a class="nav-link text-white active" href=<?= base_url('app/parkir'); ?>>Parkir</a>
                    <a class="nav-link text-white" href=<?= base_url('app/log'); ?>>Log</a>
                    <a class="nav-link text-white" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </nav>
            </div>
        </header>

        <main role="main">
            <section class="rounded-top jumbotron jumbotron-fluid text-center">
                <div class="container">
                    <h1 class="display-4 text-dark">PARKIR UAD</h1>
                    <div class="card-deck mt-4">
                        <?php
                        foreach ($dataArea as $area) : ?>
                            <div class="card text-white bg-secondary mb-3" style="max-width: 22rem;">
                                <div class="card-header">Parkir Kosong</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $area['kosong']; ?></h5>

                                </div>
                            </div>
                            <div class="card text-white bg-secondary mb-3" style="max-width: 22rem;">
                                <div class="card-header">Parkir Terpakai</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $area['terpakai']; ?></h5>

                                </div>
                            </div>
                            <div class="card text-white bg-secondary mb-3" style="max-width: 22rem;">
                                <div class="card-header">Kapasistas</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $area['kapasitas']; ?></h5>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="my-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Tambah Parkir
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Tambah Parkir</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('app/parkirCreate') ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body text-dark">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Plat Nomor</span>
                                                </div>
                                                <input type="text" name="plat" id="plat" class="form-control" placeholder="Masukkan plat nomor" aria-label="plat" aria-describedby="basic-addon1">
                                            </div>
                                            <?= form_error('plat', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <div class="album py-5 bg-light rounded-bottom">
                <div class="container">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                        <?php
                        $no = 1;
                        foreach ($dataParkir as $parkir) : ?>
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <ul class="list-group list-group-flush text-dark">
                                        <h5 class="list-group-item">Kendaraan <?= $no++; ?></h5>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Plat Nomor
                                                <span class="badge badge-primary badge-pill"><?= $parkir['plat']; ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Tanggal Masuk
                                                <span class="badge badge-primary badge-pill"><?= $parkir['tanggal']; ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Waktu Masuk
                                                <span class="badge badge-primary badge-pill"><?= $parkir['waktu_masuk']; ?></span>
                                            </li>
                                        </ul>
                                    </ul>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">Durasi Parkir <?= $parkir['durasi']; ?></small>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm rounded btn-danger" data-toggle="modal" data-target="#staticBackdrop<?= $parkir['id_parkir']; ?>">
                                                    Keluar
                                                </button>
                                                <div class="modal fade" id="staticBackdrop<?= $parkir['id_parkir']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Keluarkan Kendaraan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('app/parkirDelete') ?>" method="post" enctype="multipart/form-data">
                                                                <div class="modal-body text-dark">
                                                                    <label for="delete">Apakah yakin mengeluarkan kendaraan berikut?</label>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Plat Nomor
                                                                            <span class="badge badge-primary badge-pill"><?= $parkir['plat']; ?></span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Biaya Parkir
                                                                            <span class="badge badge-primary badge-pill"><?= $bayar; ?></span>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control invisible" id="id_parkir" name="id_parkir" value="<?= $parkir['id_parkir']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Keluarkan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner  text-white">
                <p>Copyright <a href="https://getbootstrap.com/">Aplikasi Parkir UAD</a>, 2021.</p>
            </div>
        </footer>
    </div>
</body>