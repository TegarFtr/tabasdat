<?php
include_once "../../src/koneksi.php";

if (isset($_GET['btnSearch'])) {

    $search = $_GET['search'];

    $sql = mysqli_query($koneksi, "SELECT * FROM vGetDok WHERE id_dok like '%" . $search . "%' OR nama_dok like '%" . $search . "%' OR bidang_dok like '%" . $search . "%'");
} else {
    //jika tidak ada pencarian, default yang dijalankan query ini
    $sql = mysqli_query($koneksi, "SELECT * FROM vGetDok ORDER BY nama_dok ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Dokter</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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
        <h1 class="text-center mt-3">DATA DOKTER</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">
                <h5>Tabel Dokter</h5>
            </div>
            <div class="card-body">
                <div class="input-group justify-content-md-end mb-3 d-flex">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control" placeholder="search" name="search" />
                        </div>
                        <button type="submit" name="btnSearch" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                </div>
                <table class="table table-bordered table-stripped">
                    <tr class="bg-dark-subtle">
                        <th>ID Dokter</th>
                        <th>Nama Dokter</th>
                        <th>TTL Dokter</th>
                        <th>Telp Dokter</th>
                        <th>Bidang Dokter</th>
                        <th>Aksi</th>
                    </tr>
                    <?php

                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th><?php echo $data['id_dok']; ?></th>
                            <th><?php echo $data['nama_dok']; ?></th>
                            <th><?php echo $data['ttl_dok']; ?></th>
                            <th><?php echo $data['telp_dok']; ?></th>
                            <th><?php echo $data['bidang_dok']; ?></th>

                            <td class="text-center">
                                <a href="edit_dokter.php?id_dok=<?php echo $data['id_dok']; ?>" class="btn btn-warning aedit">Edit</a>
                                <a href="hapus_dokter.php?id_dok=<?php echo $data['id_dok']; ?>" target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA INI?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="d-md-flex justify-content-md-end">
                    <a href="tambah_dokter.php" class="btn btn-primary " style="margin-right: 25px;"><b>+Data</b></a>
                    <a href="../dasboard.php" style="margin-right: 60px;" class="btn btn-primary"><b>Back</b></a>
                </div>
            </div>
        </div>
        <!-- Akhir Tabel -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>