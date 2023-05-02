<?php
include_once "../../src/koneksi.php";

if (isset($_GET['id_pen'])) {
    $id_pen = $_GET['id_pen'];
    $sql = mysqli_query($koneksi, "DELETE FROM penyakit WHERE id_pen='$id_pen'");
    if ($sql) {
        header("location:penyakit.php");
    }
} else {
    echo "<b>Data yang dihapus tidak ada</b>";
}
