<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Tambah Data Pengguna</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi form tambah data pengguna.</p>
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

            <!-- Form Tambah Data -->
            <div class="table-responsive">
                <form method="POST" action="proses-pengguna.php">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="min-width: 15vw;">Username</td>
                                <td style="min-width: 60vw;"><input type="text" name="username" placeholder="Username" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text" name="password" placeholder="Password" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Nama Depan</td>
                                <td><input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Nama Belakang</td>
                                <td><input type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Alamat Email</td>
                                <td><input type="text" name="alamat_email" placeholder="Alamat Email" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Alamat Pengiriman</td>
                                <td><input type="text" name="alamat_pengiriman" placeholder="Alamat Pengiriman" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td><input type="text" name="nomor_telepon" placeholder="Nomor Telepon" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Tanggal Registrasi</td>
                                <td><input type="text" name="tanggal_registrasi" placeholder="Tanggal Registrasi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="tambah-pengguna" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambahkan</button>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </section>

<?php include('footer.php'); ?>
