<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");

if (isset($_POST["submit"])) {
  $id = $_GET["id"];

  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $asal = $_POST["asal"];

  // ada 2 parameter woy, ulah poho :v
  $result = mysqli_query($connect, "UPDATE seluruh_data SET data_nama='$nama', data_alamat='$alamat', data_asal='$asal' WHERE data_id=$id");

  echo "<script>alert('Data berhasil diedit!'); document.location.href = 'index.php';</script>";
}

$id = $_GET["id"];
$result = mysqli_query($connect, "SELECT * FROM seluruh_data WHERE data_id=$id");
while ($data_user = mysqli_fetch_array($result)) {
  $data_nama = $data_user["data_nama"];
  $data_alamat = $data_user["data_alamat"];
  $data_asal = $data_user["data_asal"];
}


?>

<html>

<head>
  <title>Edit Data - CRUD</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <h1>
    <a href="index.php">CRUD Dasar</a>
  </h1>
  <h2>Edit Data <small>CRUD</small></h2>
  <form action="" method="POST">
    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama" placeholder="Nama" value="<?= $data_nama; ?>"><br>
    <label for="alamat">Alamat: </label>
    <input type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?= $data_alamat; ?>"><br>
    <label for="asal">Asal: </label>
    <input type="text" name="asal" id="asal" placeholder="Asal" value="<?= $data_asal; ?>"><br>
    <button type="submit" name="submit">Kirim</button>
  </form>
  <a href="index.php"><button>Kembali</button></a>
</body>

</html>