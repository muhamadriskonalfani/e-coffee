<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Edit Data Pengguna</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi form edit data pengguna.</p>
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

            <!-- Form Edit Produk -->
            <?php 
                if(isset($_GET['edit-pengguna'])): 
                    $id_pengguna = $_GET['edit-pengguna'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
                    $data = mysqli_fetch_array($query);
            ?>
                <div class="table-responsive">
                    <form method="POST" action="proses-pengguna.php">
                        <input type="hidden" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="min-width: 15vw;">Username</td>
                                    <td style="min-width: 60vw;"><input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Nama Depan</td>
                                    <td><input type="text" name="nama_depan" class="form-control" value="<?php echo $data['nama_depan']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Nama Belakang</td>
                                    <td><input type="text" name="nama_belakang" class="form-control" value="<?php echo $data['nama_belakang']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat Email</td>
                                    <td><input type="text" name="alamat_email" class="form-control" value="<?php echo $data['alamat_email']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat Pengiriman</td>
                                    <td><input type="text" name="alamat_pengiriman" class="form-control" value="<?php echo $data['alamat_pengiriman']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td><input type="text" name="nomor_telepon" class="form-control" value="<?php echo $data['nomor_telepon']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Registrasi</td>
                                    <td><input type="text" name="tanggal_registrasi" class="form-control" value="<?php echo $data['tanggal_registrasi']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="edit-pengguna" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Simpan Perubahan</button>
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
