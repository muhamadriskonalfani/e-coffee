<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Data Pengguna</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi data pengguna yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <!-- Tombol Tambah Pengguna -->
            <a href="tambah-pengguna.php" type="button" class="btn btn-primary mb-3">
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
                            <th style="min-width: 120px;">ID Pengguna</th>
                            <th style="min-width: 120px;">Username</th>
                            <th style="min-width: 120px;">Password</th>
                            <th style="min-width: 140px;">Alamat E-Mail</th>
                            <th style="min-width: 140px;">Nomor Telepon</th>
                            <th style="min-width: 230px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna");
                            while($data = mysqli_fetch_assoc($query)){
                        ?>

                            <tr>
                                <td>
                                    <?php echo $data['id_pengguna']; ?>
                                </td>
                                <td>
                                    <?php echo $data['username']; ?>
                                </td>
                                <td>
                                    <?php echo $data['password']; ?>
                                </td>
                                <td>
                                    <?php echo $data['alamat_email']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nomor_telepon']; ?>
                                </td>
                                <td>
                                    <a href="detail-pengguna.php?detail-pengguna=<?php echo $data['id_pengguna']; ?>" type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i>
                                        detail
                                    </a>
                                    <a href="edit-pengguna.php?edit-pengguna=<?php echo $data['id_pengguna']; ?>" type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                        edit
                                    </a>
                                    <a href="proses-pengguna.php?hapus-pengguna=<?php echo $data['id_pengguna']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
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
