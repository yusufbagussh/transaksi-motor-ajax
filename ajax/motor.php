<table border="1" class="table">
    <tr class="bg-dark text-white">
        <th>No</th>
        <th>Id Kendaraan</th>
        <th>Nama Kendaraan</th>
        <th>Harga</th>
        <th>Tahun</th>
    </tr>
    <?php
    //menuju ke file function.php
    require '../function.php';

    //digunakan untuk menghilangkan adanya informasi error
    ini_set('display_errors', 0);

    //Untuk Mengatur pada bagian pencarian
    $no = 1;

    //bagian id_motor
    if ($id_motor = $_GET["id_motor"]) {
        $data = mysqli_query($conn, "SELECT `Id`, `nama`, `harga`, `tahun` FROM `data_motor` 
    WHERE Id LIKE'%$id_motor%' 
    ");
        while ($m = mysqli_fetch_array($data)) {
    ?>
            <tr>
                <th><?= $no++ ?></th>
                <td><?php echo $m['Id']; ?></td>
                <td><?php echo $m['nama']; ?></td>
                <td><?= "Rp " ?><?php echo number_format($m['harga'], 0, ".", ".") ?></td>
                <td><?php echo $m['tahun']; ?></td>
            </tr>
        <?php
        }
        //bagian nama_motor
    } elseif ($nama = $_GET["nama"]) {
        $data = mysqli_query($conn, "SELECT `Id`, `nama`, `harga`, `tahun` FROM `data_motor` 
    WHERE nama LIKE'%$nama%' 
    ");
        while ($m = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <th><?= $no++ ?></th>
                <td><?php echo $m['Id']; ?></td>
                <td><?php echo $m['nama']; ?></td>
                <td><?= "Rp " ?><?php echo number_format($m['harga'], 0, ".", ".") ?></td>
                <td><?php echo $m['tahun']; ?></td>
            </tr>
        <?php
        }
        //bagian harga_motor
    } elseif ($harga = $_GET["harga"]) {
        $data = mysqli_query($conn, "SELECT `Id`, `nama`, `harga`, `tahun` FROM `data_motor` 
    WHERE harga LIKE'%$harga%' 
    ");
        while ($m = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <th><?= $no++ ?></th>
                <td><?php echo $m['Id']; ?></td>
                <td><?php echo $m['nama']; ?></td>
                <td><?= "Rp " ?><?php echo number_format($m['harga'], 0, ".", ".") ?></td>
                <td><?php echo $m['tahun']; ?></td>
            </tr>
        <?php
        }
        //bagian tahun_motor
    } elseif ($tahun = $_GET["tahun"]) {
        $data = mysqli_query($conn, "SELECT `Id`, `nama`, `harga`, `tahun` FROM `data_motor` 
    WHERE tahun LIKE'%$tahun%' 
    ");
        while ($m = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <th><?= $no++ ?></th>
                <td><?php echo $m['Id']; ?></td>
                <td><?php echo $m['nama']; ?></td>
                <td><?= "Rp " ?><?php echo number_format($m['harga'], 0, ".", ".") ?></td>
                <td><?php echo $m['tahun']; ?></td>
            </tr>
    <?php
        }
    }
    ?>
</table>