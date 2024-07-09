<?php
include "db_conn.php"; // Including the connection file

$sql = "SELECT * FROM pekerja"; // Remove single quotes from table name
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat Pekerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QZR6B4FvBQWk9vGNF8z2PZsBCVvj5F++xGwhpP2CZCHB6XhDHR+8g/Cu0l+vEz6" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            overflow: hidden;
            max-width: 80%;
        }
        .table thead {
            background-color: #343a40;
            color: #fff;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        h1 {
            margin-top: 20px;
            text-align: center; /* Center align the heading */
        }
        /* Styles for update and delete buttons */
        .btn-update {
            background-color: #ffc107; /* Yellow */
            color: #212529;
            border-color: #ffc107;
        }
        .btn-update:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545; /* Red */
            color: #fff;
            border-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .header-btn {
            text-align: left; /* Align header button to the left */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h1>MAKLUMAT PEKERJA</h1>
            <div class="header-btn">
    <button type="button" class="btn btn-primary my-5 text-light" onclick="location.href='add.php';">ADD</button>
</div>

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA PEKERJA</th>
                                <th>NO KP</th>
                                <th>NO HP</th>
                                <th>JANTINA</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                while ($row = mysqli_fetch_array($result)) {

                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['nama_pekerja'] . "</td>";
                                    echo "<td>" . $row['no_kp'] . "</td>";
                                    echo "<td>" . $row['no_hp'] . "</td>";
                                    echo "<td>" . $row['jantina'] . "</td>";

                                    echo "<td>
                                            <div class='btn-group'>
                                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm btn-update'>UPDATE</a>
                                                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm btn-delete' onclick=\"return confirm('Adakah anda pasti untuk menghapuskan rekod ini?');\">DELETE</a>
                                            </div>
                                          </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-4qqfYY2+x0L+gFGlgD1b8cYpWwtevKuqGN0SjR7tKo5lwsZx6fZ3BpTFRGm+rmYv" crossorigin="anonymous"></script>
</body>
</html>
