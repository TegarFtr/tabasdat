<?php
include_once "../../src/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        .card {
            margin: 0 10px;
        }

        .card .card-body a {
            margin: 0 -10px;
        }

        .card .card-body a.aedit {
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">DATA OBAT</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">
                <h5>Tabel Obat</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <tr class="bg-dark-subtle">
                        <th>ID Obat</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Kadaluwarsa</th>
                        <th>Stok Obat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM obat");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th><?php echo $data['id_obat']; ?></th>
                            <th><?php echo $data['nam_obat']; ?></th>
                            <th><?php echo $data['jenis_obat']; ?></th>
                            <th><?php echo $data['kadaluwarsa']; ?></th>
                            <th><?php echo $data['stok_obat']; ?></th>

                            <td class="text-center">
                                <a href="edit_obat.php?id_obat=<?php echo $data['id_obat']; ?>" class="btn btn-warning aedit">Edit</a>
                                <a href="hapus_obat.php?id_obat=<?php echo $data['id_obat']; ?>" target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA INI?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="d-md-flex justify-content-md-end">
                    <a href="tambah_obat.php" class="btn btn-primary " style="margin-right: 25px;"><b>+Data</b></a>
                    <a href="../dasboard.php" style="margin-right: 60px;" class="btn btn-primary"><b>Back</b></a>
                </div>
            </div>
        </div>
        <!-- Akhir Tabel -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>