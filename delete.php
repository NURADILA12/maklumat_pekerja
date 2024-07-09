<?php
include "db_conn.php";

if(isset($_GET['id'])){
    //ambil id dari fail senarai-pelajar
    $id = $_GET['id'];

    //buat query hapus dari database
    $sql = "DELETE FROM pekerja WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // periksa adakah data telah dihapus 
    if($query){
        header('location: index.php');
    }else{
        die("Data tidak berjaya dihapuskan");
    }
}
?>
