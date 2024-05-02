
    <div class="container">

        <h2 class="text-center mt-5 mb-3">Insert New Data</h2>

        <?= form_open_multipart('post/insert') ?>
        <div class="form-group mb-3">
            <label for="judul_foto" class="form-label">Judul Foto</label>
            <input type="text" name="judul_foto" class="form-control" id="judul_foto">
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
            <input type="text" name="deskripsi_foto" class="form-control" id="deskripsi_foto">
        </div>

        <div class="form-group mb-3">
            <label for="lokasi_file">Gambar</label>
            <input type="file" name="lokasi_file" class="form-control" id="lokasi_file">
        </div>

        <button type="submit" class="btn btn-success btn-sm">Upload</button>
        <?= form_close() ?>


    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>