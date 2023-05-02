<?php
include_once "../../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_obat = $_POST['id_obat'];
    $nam_obat = $_POST['nam_obat'];
    $jenis_obat = $_POST['jenis_obat'];
    $kadaluwarsa = $_POST['kadaluwarsa'];
    $stok_obat = $_POST['stok_obat'];

    $sqlEdit = mysqli_query($koneksi, "UPDATE obat SET nam_obat='$nam_obat', jenis_obat='$jenis_obat', kadaluwarsa='$kadaluwarsa', stok_obat='$stok_obat'
                WHERE id_obat='$id_obat'");

    if ($sqlEdit) {
        header("location:obat.php");
    } else {
        header("location:edit_obat.php");
    }
    exit;
}

$id_obat = $_GET['id_obat'];
$sql = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat = '$id_obat'");
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
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Data obat</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Masukkan Data obat</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Form -->
                    <div class="form-group">
                        <label><b>ID Obat</b></label>
                        <input type="number" name="id_obat" class="form-control" value="<?php echo $data['id_obat']; ?>" readonly="true" />
                    </div>
                    <div class="form-group">
                        <label><b>Nama Obat</b></label>
                        <input type="text" name="nam_obat" class="form-control" value="<?php echo $data['nam_obat']; ?>" required  />
                    </div>
                    <div class="form-group">
                        <label><b>Jenis Obat</b></label>
                        <input type="tetx" name="jenis_obat" class="form-control" value="<?php echo $data['jenis_obat']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>Kadaluwarsa</b> </label>
                        <input type="date" name="kadaluwarsa" class="form-control" value="<?php echo $data['kadaluwarsa']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>Stok Obat</b> </label>
                        <input type="number" name="stok_obat" class="form-control" value="<?php echo $data['stok_obat']; ?>" required />
                    </div>

                    <!-- Form -->
                    <button type="submit" class="btn btn-success mt-3" name="btnSimpan">Simpan</button>
                    <button type="submit" class="btn btn-success mt-3" name="back"><a href="obat.php">Kembali</a></button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Tabel -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>