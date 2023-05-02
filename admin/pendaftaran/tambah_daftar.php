<?php
include_once "../../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_daftar = $_POST['id_daftar'];
    $tgl_daftar = $_POST['tgl_daftar'];
    $keluhan = $_POST['keluhan'];

    $sqlTambah = mysqli_query($koneksi, "INSERT INTO pendaftaran(id_daftar, tgl_daftar, keluhan) VALUES ('$id_daftar', '$tgl_daftar', '$keluhan')");

    if ($sqlTambah) {
        header("location:daftar.php");
    } else {
        header("location:tambah_daftar.php");
    }
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        .card {
            margin: 0 60px;
        }

        .card .card-body a.aedit {
            margin-right: 20px;
        }

        .form-group {
            margin-top: 15px;
        }

        label {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Data Pendaftaran</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Silahkan Isi Form Pendaftaran!</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Form -->
                    <div class="form-group">
                        <label><b>ID Daftar</b></label>
                        <input type="number" name="id_daftar" class="form-control" placeholder="Input" />
                    </div>
                    <div class="form-group">
                        <label><b>Tanggal Daftar</b> </label>
                        <input type="date" name="tgl_daftar" class="form-control" placeholder="Input" required />
                    </div>
                    <div class="form-group">
                        <label><b>Keluhan</b></label>
                        <input type="text" name="keluhan" class="form-control" placeholder="Input" />
                    </div>
                    
                    <!-- Form -->
                    <button type="submit" class="btn btn-success mt-3" name="btnSimpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Tabel -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>