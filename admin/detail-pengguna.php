<?php include('header.php'); ?>

        <style>
            .detail-container-user {
                display: grid;
                grid-template-areas: 'left right';
                grid-template-columns: repeat(2, 1fr);
                column-gap: 4rem;
                padding: 1rem;
            }

            .detail-container-user .left {
                grid-area: left;
                display: grid;
                row-gap: 1rem;
                margin-bottom: 2rem;
            }

            .detail-container-user .left .detail-item-user {
                display: grid;
                grid-template-columns: 1fr 2fr;
            }

            .detail-container-user .left .detail-item-user .title {
                font-weight: 500;
            }

            .detail-container-user .left .detail-item-user .content {
                height: 2.4rem;
            }


            .detail-container-user .right {
                grid-area: right;
                display: flex;
                justify-content: center;
                align-items: flex-start;
            }

            .detail-container-user .right .detail-photo-user {
                color: black;
            }

            .detail-container-user .right .detail-photo-user .title {
                font-weight: 500;
                margin-bottom: 1rem;
            }

            .detail-container-user .right .detail-photo-user .image {
                width: 20rem;
                height: 20rem;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 5px solid grey;
                border-radius: 50%;
                overflow: hidden;
            }

            .detail-container-user .right .detail-photo-user .image img {
                width: 100%;
                height: 100%;
            }



        </style>

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
                    $sqlSelectedUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
                    $userData = mysqli_fetch_array($sqlSelectedUser);
            ?>
                <div class="responsive detail-container-user">
                    <div class="left">
                        <div class="detail-item-user">
                            <div class="title">ID Pengguna</div>
                            <div class="content form-control"><?php echo $userData['id_pengguna']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Nama Pengguna</div>
                            <div class="content form-control"><?php echo $userData['username']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Kata Sandi</div>
                            <div class="content form-control"><?php echo $userData['password']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Nama Depan</div>
                            <div class="content form-control"><?php echo $userData['nama_depan']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Nama Belakang</div>
                            <div class="content form-control"><?php echo $userData['nama_belakang']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Jenis Kelamin</div>
                            <div class="content form-control"><?php echo $userData['jenis_kelamin']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Alamat Email</div>
                            <div class="content form-control"><?php echo $userData['alamat_email']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Alamat Pengiriman</div>
                            <div class="content form-control"><?php echo $userData['alamat_pengiriman']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Nomor Telepon</div>
                            <div class="content form-control"><?php echo $userData['nomor_telepon']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Tanggal Register</div>
                            <div class="content form-control"><?php echo $userData['tanggal_registrasi']; ?></div>
                        </div>
                        <div class="detail-item-user">
                            <div class="title">Kota</div>
                            <div class="content form-control"><?php echo $userData['kota']; ?></div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="detail-photo-user">
                            <div class="title">Foto Profil</div>
                            <div class="image">
                                <?php if($userData['foto_profil'] !== '') { ?>
                                    <img src="../assets/photo_profile/<?php echo $userData['foto_profil']; ?>" alt="">
                                <?php } else { ?>
                                    <img src="../assets/img/profile.jpeg" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="delete-user">
                        <a href="proses-pengguna.php?hapus-pengguna=<?php echo $data['id_pengguna']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
                            <i class="fa fa-trash"></i>
                            hapus
                        </a>
                    </div>

                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
