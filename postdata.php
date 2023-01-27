<?php
include_once('koneksi.php');

// echo var_dump($_POST);
// Kolom data di table
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$jk = $_POST['jenkel'];
$foto = $_FILES['foto']['name'];

// Insert data ke table
$insert_data = mysqli_query($con, "INSERT INTO data_siswa (`nama`,`nohp`,`alamat`,`email`,`jenkel`,`foto`) VALUES ('$nama','$nohp','$alamat','$email','$jk','$foto') ");

// Cek jika data berhasil dimasukkan
if ($insert_data) {
    echo "<p>Data berhasil masuk</p>";
}

// Cek jika data gagal dimasukkan
else{
    echo "<p>Data gagal masuk</p>";
}

// Pindahkan file foto ke folder assets
move_uploaded_file($_FILES["foto"]["tmp_name"], 'assets/'.$foto);

// Kembali ke halaman index setelah data berhasil dimasukkan
header("Location: index.php");

?>