<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Tambah Produk</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi form untuk menambah produk baru.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <!-- Tombol Kembali -->
            <a href="produk.php" type="button" class="btn btn-primary btn-sm mb-3">
                <i class="fa fa-reply"></i>
                Kembali
            </a>

            <!-- Form Tambah Data -->
            <div class="table-responsive">
                <form method="POST" action="proses-produk.php" enctype="multipart/form-data">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="min-width: 15vw;">Nama Produk</td>
                                <td style="min-width: 60vw;"><input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Gambar Produk</td>
                                <td><input type="file" name="gambar_produk" accept="image/*" placeholder="Gambar Produk" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="number" name="harga" placeholder="Harga" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="number" name="stok" placeholder="Stok" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="tambah-produk" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambahkan</button>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </section>

<?php include('footer.php'); ?>
