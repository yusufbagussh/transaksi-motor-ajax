<?php
require 'function.php';
ini_set('display_errors', 0);
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pembelian Motor</title>
</head>

<body style="background-color: grey;">
    <div class="container mb-5 mt-3 bg-light border border-dark pb-3 pt-3 pl-3 pr-3 border-5">
        <form action="" method="post" class="form-control">
            <center>
                <h3>Daftar Harga Motor</h3>
            </center>
            <div class="row">
                <div class="col-md-3">
                    <input type="num" class="form-control" name="id_motor" autofocus placeholder="Masukkan Id Motor" autocomplete="off" id="id_motor">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="nama" autofocus placeholder="Masukkan Nama Motor" autocomplete="off" id="nama">
                </div>
                <div class="col-md-3">
                    <input type="num" class="form-control" name="harga" autofocus placeholder="Masukkan Harga" autocomplete="off" id="harga">
                </div>
                <div class="col-md-3">
                    <input type="num" class="form-control" name="tahun" autofocus placeholder="Masukkan Tahun" autocomplete="off" id="tahun">
                </div>
            </div>
            <br>
        </form>
        <h5>
            Hasil Pencarian
        </h5>
        <div id='container'>
            <table border="1" class="table">
                <tr class="bg-dark text-white">
                    <th>No</th>
                    <th>Id Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Harga</th>
                    <th>Tahun</th>
                </tr>
                <?php
                require 'function.php';
                $no = 1;
                $data = mysqli_query($conn, "select * from data_motor");
                while ($hasil = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $hasil['Id']; ?></td>
                        <td><?= $hasil['nama']; ?></td>
                        <td><?= "Rp " . number_format($hasil['harga'], 2, ',', '.'); ?></td>
                        <td><?= $hasil['tahun']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <br><br>
        <form action="" method="post" class="form-control">
            <center>
                <h3>Silahkan Pilih Motor</h3>
            </center>
            <select name="select" class="form-control" id="select">
                <?php
                $caridata = mysqli_query($conn, "select * from data_motor");
                while ($hasil = mysqli_fetch_array($caridata)) {
                ?>
                    <option value="<?= $hasil['nama']; ?>"><?= $hasil['nama']; ?></option>
                <?php
                }
                ?>
            </select><br>
            <button id="button" class="btn btn-primary" value="submit" onclick="sendData()">Tambah</button>
        </form><br>
        <div id="datane">
            <table border="1" class="table">
                <div>
                    <center>
                        <h3>Tabel Transaksi Penjualan</h3>
                    </center>
                    <tr class="bg-dark text-white">
                        <th>Id Penjualan</th>
                        <th>Nama Kendaraan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    require 'function.php';
                    $no = 1;
                    $data = mysqli_query($conn, "select * from beli");
                    while ($hasil = mysqli_fetch_array($data)) {
                        $patok = $hasil['Id_penjualan'];
                    ?>
                        <tr>
                            <td><?= $hasil['Id_penjualan']; ?></td>
                            <td><?= $hasil['nama_motor']; ?></td>
                            <td><?= "Rp " . number_format($hasil['jumlah'], 2, ',', '.'); ?></td>
                            <td><input type="num" class="form-control" name="jumlah" id="jumlah<?= $patok; ?>" onkeyup='kolom("<?= $patok; ?>")' min="1"></td>
                            <td><?= "Rp " . number_format($hasil['totalan'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </div>
            </table>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <button id="cal" class="btn btn-success text-white">Hitung Harga</button>
                <button id="del" class="btn btn-danger text-white">Hapus Transaksi</button>
            </div>
            <div class="card col-md-5">
                <h4>Total Pembayaran</h4><br>
                <div id="final">
                    <!--Tempat Harga-->
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>