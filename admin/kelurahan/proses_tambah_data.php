<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbpuskesmas";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Tidak bisa terkoneksi di database: " . mysqli_connect_error());
} 

$nama = $_POST['nama'];
 // Perbaikan: Menggunakan $_POST

$sql = "INSERT INTO kelurahan (nama) VALUES ('$nama')";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("Location: index.php");
} else {
    echo "Gagal menyimpan data.";
}

mysqli_close($koneksi);
?>
