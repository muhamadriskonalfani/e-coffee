<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Detail Data Pengguna</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi detail data pengguna yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <!-- Tombol Kembali -->
            <a href="pengguna.php" type="button" class="btn btn-primary btn-sm mb-3">
                <i class="fa fa-reply"></i>
                Kembali
            </a>

            <!-- Form Detail Pengguna -->
            <?php 
                if(isset($_GET['detail-pengguna'])): 
                    $id_pengguna = $_GET['detail-pengguna'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
                    $data = mysqli_fetch_array($query);
            ?>
                <div class="responsive">
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>ID pengguna</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['id_pengguna']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Username</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['username']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Password</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['password']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Nama Depan</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['nama_depan']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Nama Belakang</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['nama_belakang']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Alamat Email</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['alamat_email']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Alamat Pengiriman</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['alamat_pengiriman']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Nomor Telepon</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['nomor_telepon']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2 pt-2"><h6>Tanggal Registrasi</h6></div>
                        <div class="col-md-10"><h6 class="form-control"><?php echo $data['tanggal_registrasi']; ?></h6></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <a href="edit-pengguna.php?edit-pengguna=<?php echo $data['id_pengguna']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                                edit
                            </a>
                            <a href="proses-pengguna.php?hapus-pengguna=<?php echo $data['id_pengguna']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
                                <i class="fa fa-trash"></i>
                                hapus
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
