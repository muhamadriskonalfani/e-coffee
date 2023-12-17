<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Edit Produk</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi form untuk merubah data produk.</p>
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

            <!-- Form Edit Produk -->
            <?php 
                if(isset($_GET['edit-produk'])): 
                    $id_produk = $_GET['edit-produk'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
                    $data = mysqli_fetch_array($query);
            ?>
                <div class="table-responsive">
                    <form method="POST" action="proses-produk.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="min-width: 15vw;">Nama Produk</td>
                                    <td style="min-width: 60vw;"><input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Gambar Produk</td>
                                    <td><input type="file" name="gambar_produk" accept="image/*" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><input type="number" name="stok" class="form-control" value="<?php echo $data['stok']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="edit-produk" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Simpan Perubahan</button>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
