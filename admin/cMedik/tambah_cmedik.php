<?php
include_once "../../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_cm = $_POST['id_cm'];
    $id_pas = $_POST['id_pas'];
    $id_dok = $_POST['id_dok'];
    $id_pen = $_POST['id_pen'];
    $riw_pen = $_POST['riw_pen'];
    $diagnosa = $_POST['diagnosa'];

    $sqlTambah = mysqli_query($koneksi, "INSERT INTO cmedik(id_cm, id_pas, id_dok, id_pen, riw_pen, diagnosa) VALUES ('$id_cm', '$id_pas', '$id_dok','$id_pen','$riw_pen','$diagnosa')");

    if ($sqlTambah) {
        header("location:cmedik.php");
    } else {
        header("location:tambah_cmedik.php");
    }
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Catatan Medik</title>
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
        <h1 class="text-center mt-3">Catatan Medik</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Masukkan Data Medik</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Form -->
                    <div class="form-group">
                        <label><b>ID CM</b></label>
                        <input type="number" name="id_cm" class="form-control" placeholder="Input" />
                    </div>
                    <div class="form-group">
                        <label><b>ID Pasien</b></label>
                        <input type="number" name="id_pas" class="form-control" placeholder="Input" required />
                    </div>
                    <div class="form-group">
                        <label><b>ID Dokter</b></label>
                        <input type="number" name="id_dok" class="form-control" placeholder="Input"  />
                    </div>
                    <div class="form-group">
                        <label><b>ID Penyakit</b> </label>
                        <input type="number" name="id_pen" class="form-control" placeholder="Input" required />
                    </div>
                    <div class="form-group">
                        <label><b>Riwayat Penyakit</b> </label>
                        <input type="text" name="riw_pen" class="form-control" placeholder="Input" required />
                    </div>
                    <div class="form-group">
                        <label><b>Diagnosa</b> </label>
                        <input type="text" name="diagnosa" class="form-control" placeholder="Input" required />
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