<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Detail Produk</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi detail data produk yang ada di database.</p>
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

            <!-- Form Detail Produk -->
            <?php 
                if(isset($_GET['detail-produk'])): 
                    $id_produk = $_GET['detail-produk'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
                    $data = mysqli_fetch_array($query);
            ?>
                <div class="responsive">
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>ID Produk</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['id_produk']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Nama Produk</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['nama_produk']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Gambar Produk</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><img src="../assets/img/<?php echo $data['gambar_produk']; ?>" class="img-fluid" alt="<?php echo "&nbsp;" . $data['gambar_produk']; ?>"></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Deskripsi</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['deskripsi']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Harga</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['harga']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Stok</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['stok']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <a href="edit-produk.php?edit-produk=<?php echo $data['id_produk']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                                edit
                            </a>
                            <a href="proses-produk.php?hapus-produk=<?php echo $data['id_produk']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
                                <i class="fa fa-trash"></i>
                                hapus
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
