<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard Unit Kerja </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbpuskesmas";

// Membuat koneksi menggunakan mysqli_connect()
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Tidak bisa terkoneksi di database: " . mysqli_connect_error());
} 
$kode = "";
$nama = "";


if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
   


    if($nama ){
        $sql1 = "INSERT INTO unit_kerja (nama) VALUES ('$nama')";
        $q1 = mysqli_query($koneksi, $sql1); // Perbaikan variabel menjadi $q1
    
        if($q1){ // Mengubah variabel dari $sq1 menjadi $q1
            $sukses = "Berhasil memasukkan data baru";
        }else{
            $error = "Gagal memasukkan data";
        }
    
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Unit Kerja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .mx-auto {
            width:800px;
        }

        .card {
            margin-top:10px;
        }
    </style>
</head>
<body>

<div class="card">
<div class="card-header text-white bg-purple">
    Data Unit Kerja 
</div>

    
    </div>
    <div class="card-body">
    <a href="tambah_data.php" class="btn btn-success">Tambah Data</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Unit Kerja</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urut = 1;
                $sql2 = "SELECT * FROM unit_kerja ORDER BY ID DESC";
                $q2 = mysqli_query($koneksi, $sql2);
                while ($r2 = mysqli_fetch_array($q2)) {
                    $id = $r2['id'];
                    $nama = $r2['nama'];
                  
                ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                      
                        <td><?php echo $nama ?></td>
                    
                        <td>
                            
                        <a href='edit.php?id=<?php echo $id ?>' class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
<a href='delete.php?id=<?php echo $id ?>' class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
    
    

    
</body>
</html>

          <!-- /.card -->
    
     
<!-- /.content-wrapper -->

