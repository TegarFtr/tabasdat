<?php
include_once "../../src/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pendaftaran</title>
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
        <h1 class="text-center mt-3">DATA PENYAKIT</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">
                <h5>Tabel Daftar</h5>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <tr class="bg-dark-subtle">
                        <th>ID Penyakit</th>
                        <th>Jenis Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM penyakit");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th><?php echo $data['id_pen']; ?></th>
                            <th><?php echo $data['jenis_pen']; ?></th>
                            <th><?php echo $data['nama_pen']; ?></th>

                            <td class="text-center">
                                <a href="edit_penyakit.php?id_pen=<?php echo $data['id_pen']; ?>" class="btn btn-warning aedit">Edit</a>
                                <a href="hapus_penyakit.php?id_pen=<?php echo $data['id_pen']; ?>" target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA INI?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
                <div class="d-md-flex justify-content-md-end">
                    <a href="tambah_penyakit.php" class="btn btn-primary " style="margin-right: 25px;"><b>+Data</b></a>
                    <a href="../dasboard.php" style="margin-right: 60px;" class="btn btn-primary"><b>Back</b></a>
                </div>
            </div>
        </div>
        <!-- Akhir Tabel -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>