<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Data Produk</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi data produk yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <!-- Tombol Tambah Produk -->
            <a href="tambah-produk.php" type="button" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i>
                Tambah Data
            </a>

            <!-- Alert -->
            <?php if(isset($_SESSION['berhasil'])) { ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong> <?php echo $_SESSION['berhasil']; ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } else if(isset($_SESSION['gagal'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> <?php echo $_SESSION['gagal']; ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }; unset($_SESSION['berhasil'], $_SESSION['gagal']); ?>

            <!-- Tabel Responsive -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="min-width: 100px;">ID Produk</th>
                            <th style="min-width: 150px;">Nama Produk</th>
                            <th style="min-width: 170px;">Gambar Produk</th>
                            <th style="min-width: 100px;">Harga</th>
                            <th style="min-width: 100px;">Stok</th>
                            <th style="min-width: 230px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                            while($data = mysqli_fetch_assoc($query)){
                        ?>

                            <tr>
                                <td>
                                    <?php echo $data['id_produk']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama_produk']; ?>
                                </td>
                                <td>
                                    <img src="../assets/product_image/<?php echo $data['gambar_produk']; ?>" alt="" style="width: 150px;">
                                </td>
                                <td>
                                    <?php echo $data['harga']; ?>
                                </td>
                                <td>
                                    <?php echo $data['stok']; ?>
                                </td>
                                <td>
                                    <a href="detail-produk.php?detail-produk=<?php echo $data['id_produk']; ?>" type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i>
                                        detail
                                    </a>
                                    <a href="edit-produk.php?edit-produk=<?php echo $data['id_produk']; ?>" type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                        edit
                                    </a>
                                    <a href="proses-produk.php?hapus-produk=<?php echo $data['id_produk']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
                                        <i class="fa fa-trash"></i>
                                        hapus
                                    </a>
                                </td>
                            </tr>

                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </section>

<?php include('footer.php'); ?>
