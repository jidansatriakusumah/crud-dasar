<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");

$id = $_GET["id"];
$data_gambar_tmp = $_GET["data_gambar"];

$result = mysqli_query($connect, "DELETE FROM seluruh_data WHERE data_id=$id");

if (file_exists('file-gambar/' . $data_gambar_tmp)) {
  unlink('file-gambar/' . $data_gambar_tmp); // hapus gambar
  echo "<script>alert('Data berhasil dihapus!'); document.location.href = 'index.php';</script>";
}
