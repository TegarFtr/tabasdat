<?php
include_once "../../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_pas = $_POST['id_pas'];
    $id_daftar = $_POST['id_daftar'];
    $id_cm = $_POST['id_cm'];
    $nama_pas = $_POST['nama_pas'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telp_pas = $_POST['telp_pas'];
    $ttl_pas = $_POST['ttl_pas'];

    $sqlEdit = mysqli_query($koneksi, "UPDATE pasien SET nama_pas='$nama_pas', nik='$nik', jenis_kelamin='$jenis_kelamin', telp_pas='$telp_pas', ttl_pas='$ttl_pas' 
                WHERE id_pas='$id_pas'");

    if ($sqlEdit) {
        header("location:pasien.php");
    } else {
        header("location:edit_pasien.php");
    }
    exit;
}

$id_pas = $_GET['id_pas'];
$sql = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pas = '$id_pas'");
$data = mysqli_fetch_array($sql);

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
        <h1 class="text-center mt-3">Data Pasien</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Masukkan Data Pasien</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Form -->
                    <div class="form-group">
                        <label><b>ID Pasien</b></label>
                        <input type="number" name="id_pas" class="form-control" value="<?php echo $data['id_pas']; ?>" readonly="true" />
                    </div>
                    <div class="form-group">
                        <label><b>ID Daftar</b></label>
                        <input type="number" name="id_daftar" class="form-control" value="<?php echo $data['id_daftar']; ?>" required readonly="true" />
                    </div>
                    <div class="form-group">
                        <label><b>ID CM</b></label>
                        <input type="number" name="id_cm" class="form-control" value="<?php echo $data['id_cm']; ?>" readonly="true" />
                    </div>
                    <div class="form-group">
                        <label><b>Nama Pasien</b> </label>
                        <input type="text" name="nama_pas" class="form-control" value="<?php echo $data['nama_pas']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>NIK</b> </label>
                        <input type="number" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>Jenis Kelamin</b> </label>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $data['jenis_kelamin']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>No Telpon</b> </label>
                        <input name="telp_pas" class="form-control" value="<?php echo $data['telp_pas']; ?>" type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required />
                    </div>
                    <div class="form-group">
                        <label><b>TTL</b> </label>
                        <input type="date" name="ttl_pas" class="form-control" value="<?php echo $data['ttl_pas']; ?>" required />
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