<?php 
include('db_conn.php'); 

$id = $_GET['id'];

// Buat query untuk ambil data dari database
$sql = "SELECT * FROM pekerja WHERE id = $id";
$query = mysqli_query($conn, $sql);
$pekerja = mysqli_fetch_assoc($query);

// Jika tiada data dari database
if (!$pekerja) {
    die("Tiada data dijumpai");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QZR6B4FvBQWk9vGNF8z2PZsBCVvj5F++xGwhpP2CZCHB6XhDHR+8g/Cu0l+vEz6" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            overflow: hidden;
            max-width: 600px; /* Set maximum width for the card */
        }
        .card-header {
            background-color: #17a2b8;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 1.5em;
        }
        .form-group label {
            margin-bottom: 0.5em;
            display: block;
            font-weight: bold;
        }
        .form-control {
            width: 95%; /* Ensure form controls fill the width of their container */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .card-footer {
            padding: 20px;
            overflow: hidden; /* To ensure the floated buttons don't affect the footer height */
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
            float: left; /* Float Add button to the left */
        }
        .btn-default {
            background-color: #6c757d;
            color: white;
            float: right; /* Float Cancel button to the right */
        }
        .btn-info:hover, .btn-default:hover {
            opacity: 0.8;
        }
        .header-btn {
            text-align: left; /* Align header button to the left */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="header-btn">
    <button type="button" class="btn btn-default" onclick="location.href='index.php';">BACK</button>
</div>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">UPDATE MAKLUMAT</h3>
    </div>
    <form action="update_edit.php" method="POST" class="form-horizontal">
        <div class="card-body">
            <input type="hidden" name="id" value="<?php echo $pekerja['id']; ?>">
            <div class="form-group row">
                <label for="no_kp" class="col-sm-2 col-form-label">IC</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_kp" name="no_kp" placeholder="Masukkan Nombor IC anda" value="<?php echo $pekerja['no_kp']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pekerja" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pekerja" name="nama_pekerja" placeholder="Masukkan Nama Anda" value="<?php echo $pekerja['nama_pekerja']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">NO HP</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nombor Telefon" value="<?php echo $pekerja['no_hp']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jantina" class="col-sm-2 col-form-label">JANTINA</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jantina" name="jantina">
                        <option value="lelaki" <?php if ($pekerja['jantina'] == 'lelaki') echo 'selected'; ?>>Lelaki</option>
                        <option value="perempuan" <?php if ($pekerja['jantina'] == 'perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info" onclick="location.href='index.php';"  name="edit">Update</button> &nbsp;
            <button type="button" class="btn btn-default" onclick="location.href='index.php';" name="edit">Cancel</button>
        </div>
    </form>
</div>

</body>
</html>
