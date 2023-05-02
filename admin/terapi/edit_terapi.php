<?php
include_once "../../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $id_ter = $_POST['id_ter'];
    $nama_ter = $_POST['nama_ter'];
    $jenis_ter = $_POST['jenis_ter'];

    $sqlEdit = mysqli_query($koneksi, "UPDATE terapi SET nama_ter='$nama_ter', jenis_ter='$jenis_ter'
                WHERE id_ter='$id_ter'");

    if ($sqlEdit) {
        header("location:terapi.php");
    } else {
        header("location:edit_terapi.php");
    }
    exit;
}

$id_ter = $_GET['id_ter'];
$sql = mysqli_query($koneksi, "SELECT * FROM terapi WHERE id_ter = '$id_ter'");
$data = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Terapi</title>
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

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Data Terapi</h1>
        <!-- Awal Tabel -->
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Silahkan Isi Form Data Terapi</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!-- Form -->
                    <div class="form-group">
                        <label><b>ID Terapi</b></label>
                        <input type="number" name="id_ter" class="form-control" value="<?php echo $data['id_ter']; ?>" readonly="true" />
                    </div>
                    <div class="form-group">
                        <label><b>Nama Terapi</b> </label>
                        <input type="text" name="nama_ter" class="form-control" value="<?php echo $data['nama_ter']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label><b>Jenis Terapi</b></label>
                        <input type="text" name="jenis_ter" class="form-control" value="<?php echo $data['jenis_ter']; ?>" required />
                    </div>

                    <!-- Form -->
                    <button type="submit" class="btn btn-success mt-3" name="btnSimpan">Simpan</button>
                    <button type="" class="btn btn-success mt-3" name="back"><a href="terapi.php">Kembali</a></button>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Tabel -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>