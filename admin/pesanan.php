<?php include('header.php'); ?>

        <section class="main">
            <!-- Judul -->
            <h1 class="">Data Pesanan</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi data pesanan yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <!-- Tabel Responsive -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="min-width: 100px;">ID Pesanan</th>
                            <th style="min-width: 120px;">ID Pengguna</th>
                            <th style="min-width: 170px;">Tanggal Pesanan</th>
                            <th style="min-width: 120px;">Jumlah Total</th>
                            <th style="min-width: 130px;">Status Pesanan</th>
                            <th style="min-width: 170px;">Status Pembayaran</th>
                            <th style="min-width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_pesanan");
                            while($data = mysqli_fetch_assoc($query)){
                        ?>

                            <tr>
                                <td>
                                    <?php echo $data['id_pesanan']; ?>
                                </td>
                                <td>
                                    <?php echo $data['id_pengguna']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tanggal_pesanan']; ?>
                                </td>
                                <td>
                                    <?php echo $data['jumlah_total']; ?>
                                </td>
                                <td>
                                    <?php echo $data['status_pesanan']; ?>
                                </td>
                                <td>
                                    <?php echo $data['status_pembayaran']; ?>
                                </td>
                                <td>
                                    <a href="detail-pesanan.php?detail-pesanan=<?php echo $data['id_pesanan']; ?>" type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i>
                                        detail
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
