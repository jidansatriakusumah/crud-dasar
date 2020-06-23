<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_POST["submit"])) {
  $data_nama = $_POST["nama"];
  $data_alamat = $_POST["alamat"];
  $data_asal = $_POST["asal"];

  $connect = new mysqli("localhost", "root", "", "crud_dasar");
  $result = mysqli_query($connect, "INSERT INTO seluruh_data (data_nama, data_alamat, data_asal) VALUES ('$data_nama', '$data_alamat', '$data_asal')");
  echo "<script>alert('Data berhasil ditambah!'); document.location.href = 'index.php';</script>";
}

?>

<html>

<head>
  <title>Buat Data - CRUD</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <h1>
    <a href="index.php">CRUD Dasar</a>
  </h1>
  <h2>Buat Data <small>CRUD</small></h2>
  <form action="" method="POST">
    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama" placeholder="Nama"><br>
    <label for="alamat">Alamat: </label>
    <input type="text" name="alamat" id="alamat" placeholder="Alamat"><br>
    <label for="asal">Asal: </label>
    <input type="text" name="asal" id="asal" placeholder="Asal"><br>
    <button type="submit" name="submit">Kirim</button>
  </form>
  <a href="index.php"><button>Kembali</button></a>
</body>


</html>