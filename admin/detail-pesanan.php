<?php include('header.php'); ?>

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
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pesanan WHERE id_pesanan = '$id_pesanan'");
                    $data = mysqli_fetch_array($query);
            ?>
                <div class="responsive">
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>ID Pesanan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['id_pesanan']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>ID Pengguna</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['id_pengguna']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Alamat Pengiriman</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['alamat_pengiriman']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Alamat Penagihan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['alamat_penagihan']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Tanggal Pesanan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['tanggal_pesanan']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Jumlah Total</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['jumlah_total']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Status Pesanan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['status_pesanan']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Metode Pembayaran</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['metode_pembayaran']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Status Pembayaran</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['status_pembayaran']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Metode Pengiriman</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['metode_pengiriman']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Nomor Pelacakan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['nomor_pelacakan']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Catatan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['catatan']; ?></h6></div>
                    </div>
                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
