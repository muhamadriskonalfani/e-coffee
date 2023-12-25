<?php include('header.php'); ?>

        <style>
            .detail-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                column-gap: 4rem;
                row-gap: 1rem;
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .detail-container .detail-item {
                display: grid;
                grid-template-columns: 1fr 2fr;
            }

            .detail-container .detail-item .title {
                font-weight: 500;
                margin-bottom: 10px;
            }

            .detail-container .detail-item .content {
                height: 2.4rem;
            }

        </style>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Detail Data Pesanan</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi detail data pesanan yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <!-- Tombol Kembali -->
            <a href="pesanan.php" type="button" class="btn btn-primary btn-sm mb-3">
                <i class="fa fa-reply"></i>
                Kembali
            </a>

            <!-- Form Detail Pesanan -->
            <?php 
                if(isset($_GET['detail-pesanan'])): 
                    $id_pesanan = $_GET['detail-pesanan'];
                    $sqlSelectedOrder = mysqli_query($koneksi, "SELECT * FROM tb_pesanan WHERE id_pesanan = '$id_pesanan'");
                    $orderData = mysqli_fetch_array($sqlSelectedOrder);
            ?>
                <div class="responsive detail-container">
                    <div class="detail-item">
                        <div class="title">ID Pesanan</div>
                        <div class="content form-control"><?php echo $orderData['id_pesanan']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">ID Pengguna</div>
                        <div class="content form-control"><?php echo $orderData['id_pengguna']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Nama Depan</div>
                        <div class="content form-control"><?php echo $orderData['nama_depan']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Nama Belakang</div>
                        <div class="content form-control"><?php echo $orderData['nama_belakang']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Alamat Pengiriman</div>
                        <div class="content form-control"><?php echo $orderData['alamat_pengiriman']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Alamat Email</div>
                        <div class="content form-control"><?php echo $orderData['alamat_email']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Nomor Telepon</div>
                        <div class="content form-control"><?php echo $orderData['nomor_telepon']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Tanggal Pesanan</div>
                        <div class="content form-control"><?php echo $orderData['tanggal_pesanan']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Total Produk</div>
                        <div class="content form-control"><?php echo $orderData['quantity']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Total Tagihan</div>
                        <div class="content form-control"><?php echo $orderData['jumlah_total']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Status Pesanan</div>
                        <div class="content form-control"><?php echo $orderData['status_pesanan']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="title">Status Pembayaran</div>
                        <div class="content form-control"><?php echo $orderData['status_pembayaran']; ?></div>
                    </div>
                </div>

                <div class="delete-order">
                    <a href="?delete-order=<?php echo $id_pesanan; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin???')"><i class="fa fa-trash"></i> Hapus</a>
                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
