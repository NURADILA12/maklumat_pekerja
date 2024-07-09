<?php
include("db_conn.php"); // Include the connection file

// Check if form is submitted
if(isset($_POST['edit'])){
    // Retrieve form data
    $id = $_POST['id'];
    $nama_pekerja = $_POST['nama_pekerja'];
    $no_kp = $_POST['no_kp'];
    $jantina = $_POST['jantina'];
    $no_hp = $_POST['no_hp'];

    // Prepare the update query
    $sql = "UPDATE pekerja SET nama_pekerja = ?, no_kp = ?, jantina = ?, no_hp = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssssi", $nama_pekerja, $no_kp, $jantina, $no_hp, $id);

    // Execute the statement
    $query = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if($query){
        header('Location: index.php?status=berjaya'); // Redirect to index.php if successful
    } else {
        header('Location: index.php?status=gagal'); // Redirect to index.php if failed
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
