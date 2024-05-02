    
    <div class="container">

        <h2 class="text-center mt-5">Member Post</h2>
        <p><a class="btn btn-success btn-sm" href=" <?= site_url('post/halaman_tambah') ?>">Create New Post</a></p>
        <?= $this->session->flashdata('message'); ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Caption</th>
                    <th>Deskription</th>
                    <th>Ubah</th>
                </tr>
            </thead>

            <!-- Pengambilan data dari databse -->
            <tbody>
                <?php $no= 1; ?>
                <?php foreach ($data as $d) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><img src="<?= base_url('assets/img/') . $d->lokasi_file; ?>" alt="gambar" width="100"
                            title="<?= $d->judul_foto; ?>">
                    </td>
                    <td><?= $d->judul_foto; ?></td>
                    <td><?= $d->deskripsi_foto; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href=" <?= base_url('post/form_edit/' . $d->foto_id) ?>"> <i
                                class="fa-solid fa-edit"></i> Update</a>
                        <a class="btn btn-sm btn-danger" href="<?= base_url('post/delete/' . $d->foto_id) ?>"> <i
                                class="fa-solid fa-trash-can text-dark-"></i> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

    <!-- Bootstrap core JS-->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>