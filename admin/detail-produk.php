<?php include('header.php'); ?>

        <style>
            .detail-container-produk {
                display: grid;
                grid-template-areas: 'left right';
                grid-template-columns: repeat(2, 1fr);
                column-gap: 4rem;
                padding: 1rem;
            }

            .detail-container-produk .left {
                grid-area: left;
                display: grid;
                row-gap: 1rem;
                margin-bottom: 2rem;
            }

            .detail-container-produk .left .detail-item-produk {
                display: grid;
                grid-template-columns: 1fr 2fr;
            }

            .detail-container-produk .left .detail-item-produk .title {
                font-weight: 500;
            }

            .detail-container-produk .left .detail-item-produk .content {
                height: 2.4rem;
            }


            .detail-container-produk .right {
                grid-area: right;
                display: flex;
                justify-content: center;
                align-items: flex-start;
            }

            .detail-container-produk .right .detail-photo-produk {
                color: black;
            }

            .detail-container-produk .right .detail-photo-produk .title {
                font-weight: 500;
                margin-bottom: 1rem;
            }

            .detail-container-produk .right .detail-photo-produk .image {
                width: 20rem;
                height: 20rem;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 5px solid grey;
                border-radius: 50%;
                overflow: hidden;
            }

            .detail-container-produk .right .detail-photo-produk .image img {
                width: 100%;
                height: 100%;
            }

        </style>

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
                    $sqlSelectedProduct = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
                    $productData = mysqli_fetch_array($sqlSelectedProduct);
            ?>
                <div class="responsive detail-container-produk">
                    <div class="left">
                        <div class="detail-item-produk">
                            <div class="title">ID Produk</div>
                            <div class="content form-control"><?php echo $productData['id_produk']; ?></div>
                        </div>
                        <div class="detail-item-produk">
                            <div class="title">Nama Produk</div>
                            <div class="content form-control"><?php echo $productData['nama_produk']; ?></div>
                        </div>
                        <div class="detail-item-produk">
                            <div class="title">Deskripsi</div>
                            <div class="content form-control"><?php echo $productData['deskripsi']; ?></div>
                        </div>
                        <div class="detail-item-produk">
                            <div class="title">Harga</div>
                            <div class="content form-control"><?php echo $productData['harga']; ?></div>
                        </div>
                        <div class="detail-item-produk">
                            <div class="title">Stok</div>
                            <div class="content form-control"><?php echo $productData['stok']; ?></div>
                        </div>
                    </div>
                    
                    <div class="right">
                        <div class="detail-photo-produk">
                            <div class="title">Gambar Produk</div>
                            <div class="image">
                                <?php if($productData['gambar_produk'] !== '') { ?>
                                    <img src="../assets/product_image/<?php echo $productData['gambar_produk']; ?>" alt="">
                                <?php } else { ?>
                                    <img src="../assets/img/profile.jpeg" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="manage">
                        <a href="edit-produk.php?edit-produk=<?php echo $productData['id_produk']; ?>" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                            edit
                        </a>
                        <a href="proses-produk.php?hapus-produk=<?php echo $productData['id_produk']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut ???')">
                            <i class="fa fa-trash"></i>
                            hapus
                        </a>
                    </div>
                    
                </div>
            <?php endif; ?>
        </section>

<?php include('footer.php'); ?>
