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

$id = $_GET['id'];

$sql = "SELECT * FROM unit_kerja WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
 
   
} else {
    echo "Data tidak ditemukan.";
    exit;
}

$sukses = "";
$error = "";

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    
 


    $sql = "UPDATE unit_kerja SET nama='$nama' WHERE id=$id";


    if (mysqli_query($koneksi, $sql)) {
        $sukses = "Data berhasil diupdate";
        // Mengarahkan pengguna kembali ke halaman utama setelah 2 detik
        header("refresh:2; url=index.php");
    } else {
        $error = "Error updating record: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <h2>Edit Data Unit Kerja</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Unit Kelurahan </label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $nama ?>">
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
