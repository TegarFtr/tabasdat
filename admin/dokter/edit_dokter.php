<?php
include_once "../../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_dok = $_POST['id_dok'];
    $nama_dok = $_POST['nama_dok'];
    $ttl_dok = $_POST['ttl_dok'];
    $telp_dok = $_POST['telp_dok'];
    $bidang_dok = $_POST['bidang_dok'];

    $sqlEdit = mysqli_query($koneksi, "UPDATE dokter SET nama_dok='$nama_dok' , ttl_dok='$ttl_dok', telp_dok='$telp_dok', bidang_dok='$bidang_dok' 
    WHERE id_dok='$id_dok'");

    if ($sqlEdit) {
        header("location:dokter.php");
    } else {
        header("location:edit_dokter.php");
    }
    exit;
}

$id_dok = $_GET['id_dok'];
$sql = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dok = '$id_dok'");
$data = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Dokter</title>
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
        <h1 class="text-center mt-3">Data Dokter</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Masukkan Data Dokter</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Form -->
                    <div class="form-group">
                        <label><b>ID Dokter</b></label>
                        <input type="number" name="id_dok" class="form-control" value="<?php echo $data['id_dok']; ?>" readonly="true" required />
                    </div>
                    <div class="form-group">
                        <label><b>Nama Dokter</b> </label>
                        <input type="text" name="nama_dok" class="form-control" value="<?php echo $data['nama_dok']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>TTL</b> </label>
                        <input type="date" name="ttl_dok" class="form-control" value="<?php echo $data['ttl_dok']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>No Telpon</b> </label>
                        <input name="telp_dok" class="form-control" value="<?php echo $data['telp_dok']; ?>" type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required />
                    </div>
                    <div class="form-group">
                        <label><b>Bidang Dokter</b> </label>
                        <input type="text" name="bidang_dok" class="form-control" value="<?php echo $data['bidang_dok']; ?>" required />
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