<?php
    include_once "../../src/koneksi.php";

    if(isset($_GET['id_obat'])){
        $id_obat = $_GET['id_obat'];
        $sql = mysqli_query($koneksi, "DELETE FROM obat WHERE id_obat='$id_obat'");
        if($sql){
            header("location:obat.php");
        }
       
    } else{
        echo "<b>Data yang dihapus tidak ada</b>";
    }
?>