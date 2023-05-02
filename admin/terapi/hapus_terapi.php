<?php
    include_once "../../src/koneksi.php";

    if(isset($_GET['id_ter'])){
        $id_ter = $_GET['id_ter'];
        $sql = mysqli_query($koneksi, "DELETE FROM terapi WHERE id_ter='$id_ter'");
        if($sql){
            header("location:terapi.php");
        }
       
    } else{
        echo "<b>Data yang dihapus tidak ada</b>";
    }
