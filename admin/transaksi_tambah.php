<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Transaksi Laundry Baru</h4>
        </div>

        <div class="panel-body">

            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br><br>

                <form method="post" action="transaksi_aksi.php">

                    <!-- PILIH PELANGGAN -->
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select class="form-control" name="pelanggan" required="required">
                            <option value="">- Pilih Pelanggan -</option>
                            <?php 
                            $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            while($d = mysqli_fetch_array($data)){
                            ?>
                                <option value="<?php echo $d['pelanggan_id']; ?>">
                                    <?php echo $d['pelanggan_nama']; ?>
                                </option>
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>

                    <!-- BERAT -->
                    <div class="form-group">
                        <label>Berat (Kg)</label>
                        <input type="number" class="form-control" name="berat" required="required">
                    </div>

                    <br>

					<!-- TANGGAL SELESAI -->
					<div class="form-group">
    				<label>Tanggal Selesai</label>
    				<input type="date" class="form-control" name="tgl_selesai" required="required">
					</div>

					<br>


                    <!-- JENIS PAKAIAN -->
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width="20%">Jumlah</th>
                        </tr>

                        <?php for($i = 0; $i < 10; $i++){ ?>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="pakaian_jenis[]">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="pakaian_jumlah[]">
                                </td>
                            </tr>
                        <?php } ?>

                    </table>

                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>

            </div>

        </div>
    </div>
</div>
