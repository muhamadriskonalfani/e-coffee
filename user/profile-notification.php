<?php include('profile-header.php'); ?>

        <div class="profile-container-center">
            <form method="POST" action="../proses.php">
                <input type="hidden" name="id_pengguna" value="<?php echo $userID; ?>">
                <div class="display-6 title">Notifikasi</div>
                <div class="kotak-info">
                    <div class="info-item">
                        <h6>Nama Depan</h6>
                        <div class="form-control show-data"><?php echo $dataUser['nama_depan']; ?></div>
                        <input class="form-control hidden-input hide" type="text" name="nama_depan" placeholder="Nama Depan" value="<?php echo $dataUser['nama_depan']; ?>" required>
                    </div>
                    <div class="info-item">
                        <h6>Nama Belakang</h6>
                        <div class="form-control show-data"><?php echo $dataUser['nama_belakang']; ?></div>
                        <input class="form-control hidden-input hide" type="text" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $dataUser['nama_belakang']; ?>" required>
                    </div>
                    <div class="info-item">
                        <h6>Username</h6>
                        <div class="form-control show-data"><?php echo $dataUser['username']; ?></div>
                        <input class="form-control hidden-input hide" type="text" name="username" placeholder="Nama Pengguna" value="<?php echo $dataUser['username']; ?>" required>
                    </div>
                    <div class="info-item">
                        <h6>Email</h6>
                        <div class="form-control show-data"><?php echo $dataUser['alamat_email']; ?></div>
                        <input class="form-control hidden-input hide" type="email" name="alamat_email" placeholder="Alamat Email" value="<?php echo $dataUser['alamat_email']; ?>" required>
                    </div>
                    <div class="info-item">
                        <h6>Jenis Kelamin</h6>
                        <div class="form-control show-data"><?php echo $dataUser['jenis_kelamin']; ?></div>
                        <select class="form-control hidden-input hide" name="jenis_kelamin">
                            <option value="<?php echo $dataUser['jenis_kelamin']; ?>"><?php echo $dataUser['jenis_kelamin']; ?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="info-item">
                        <h6>Nomor Telepon</h6>
                        <div class="form-control show-data"><?php echo $dataUser['nomor_telepon']; ?></div>
                        <input class="form-control hidden-input hide" type="number" name="nomor_telepon" placeholder="Nomor Telepon" value="<?php echo $dataUser['nomor_telepon']; ?>" required>
                    </div>
                    <div class="info-item">
                        <h6>Alamat</h6>
                        <div class="form-control show-data"><?php echo $dataUser['alamat_pengiriman']; ?></div>
                        <input class="form-control hidden-input hide" type="text" name="alamat_pengiriman" placeholder="Alamat Tempat Tinggal" value="<?php echo $dataUser['alamat_pengiriman']; ?>" required>
                    </div>
                    <div class="info-item">
                        <h6>Kota</h6>
                        <div class="form-control show-data"><?php echo $dataUser['kota']; ?></div>
                        <input class="form-control hidden-input hide" type="text" name="kota" placeholder="Kota Asal" value="<?php echo $dataUser['kota']; ?>" required>
                    </div>
                </div>

                <div class="edit-profile mt-4">
                    <button type="button" class="btn btn-outline-light edit-button">Edit Profile</a>
                    <button type="button" name="edit-profile" class="btn btn-outline-light update hide">Simpan Perubahan</button>
                    <a href="profile-data.php" class="btn btn-outline-light cancel-update hide">Batalkan</a>
                </div>
            </form>
        </div>

        <script>
            document.querySelector('.fa-bell').parentElement.style.backgroundColor = 'var(--caramel)';
            document.querySelector('.fa-bell').parentElement.style.border = '1px solid var(--caramel)';
            document.querySelector('.fa-bell').parentElement.style.color = 'var(--milk)';
        </script>

<?php include('profile-footer.php'); ?>
