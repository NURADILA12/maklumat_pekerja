<?php
include("db_conn.php"); // Include the connection file

// Check if form is submitted
if(isset($_POST['Hantar'])){
    // Retrieve form data
    $nama_pekerja = $_POST['nama_pekerja'];
    $no_kp = $_POST['no_kp'];
    $jantina = $_POST['jantina'];
    $no_hp = $_POST['no_hp'];

    // Debug: Print form data
    echo "NAMA: $nama_pekerja <br>";
    echo "NO_KP: $no_kp <br>";
    echo "Jantina: $jantina <br>";
    echo "NO_HP: $no_hp <br>";

    // Create the SQL query
    $sql = "INSERT INTO pekerja (nama_pekerja, no_kp, jantina, no_hp) 
            VALUES ('$nama_pekerja', '$no_kp', '$jantina', '$no_hp')";

    // Debug: Print SQL query
    echo "SQL Query: $sql <br>";

    // Execute the query
    $query = mysqli_query($conn, $sql);

    // Check if the query was successful
    if($query){
        header('Location: index.php'); // Redirect to index.php if successful
    }else{
        header('Location: index.php'); // Redirect to tambah.php if failed
    }
}
?>