<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_POST["submit"])) {

  // variabel
  $data_nama = $_POST["nama"];
  $data_alamat = $_POST["alamat"];
  $data_asal = $_POST["asal"];

  // upload khusus gambar
  if (isset($_FILES["gambar"])) {

    // variabel khusus gambar
    $ekstensi_gambar_diperbolehkan = array('jpg', 'jpeg', 'png');
    $data_nama_gambar = $_FILES["gambar"]["name"];
    $x = explode('.', $data_nama_gambar);
    $ekstensi_gambar = strtolower(end($x));
    $ukuran_gambar = $_FILES["gambar"]["size"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];


    if (in_array($ekstensi_gambar, $ekstensi_gambar_diperbolehkan) === true) {
      if ($ukuran_gambar < 1044070) {
        move_uploaded_file($gambar_tmp, 'file-gambar/' . $data_nama_gambar);

        $connect = new mysqli("localhost", "root", "", "crud_dasar");
        $hasil = mysqli_query($connect, "INSERT INTO seluruh_data (data_nama, data_alamat, data_asal, data_gambar) VALUES ('$data_nama', '$data_alamat', '$data_asal', '$data_nama_gambar')");

        if ($hasil) {
          echo "<script>alert('Data berhasil ditambah! (dengan gambar)'); document.location.href = 'index.php';</script>";
        } else {
          echo "<script>alert('Gagal menambah data dengan gambar!'); document.location.href = 'create.php';</script>";
        }
      } else {
        echo "<script>alert('Ukuran gambar terlalu besar!'); document.location.href = 'create.php';</script>";
      }
    } else {
      $connect = new mysqli("localhost", "root", "", "crud_dasar");
      $result = mysqli_query($connect, "INSERT INTO seluruh_data (data_nama, data_alamat, data_asal) VALUES ('$data_nama', '$data_alamat', '$data_asal')");
      echo "<script>alert('Data berhasil ditambah! (tanpa gambar)'); document.location.href = 'index.php';</script>";
    }
  }
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
  <form action="" method="POST" enctype="multipart/form-data">
    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama" placeholder="Nama"><br>
    <label for="alamat">Alamat: </label>
    <input type="text" name="alamat" id="alamat" placeholder="Alamat"><br>
    <label for="asal">Asal: </label>
    <input type="text" name="asal" id="asal" placeholder="Asal"><br>
    <label for="gambar">Gambar: </label>
    <input type="file" name="gambar" id="gambar"><br>
    <button type="submit" name="submit">Kirim</button>
  </form>
  <a href="index.php"><button>Kembali</button></a>
</body>


</html>