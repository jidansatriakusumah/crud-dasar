<?php

session_start();
if (empty($_SESSION["login"])) {
  header("Location: 'index.php");
}

$id = $_GET["id"];

$connect = new mysqli("localhost", "root", "", "crud_dasar");
$result = mysqli_query($connect, "SELECT * FROM seluruh_data WHERE data_id=$id");
$data = mysqli_fetch_array($result);

if (isset($_POST["submit"])) {
  $connect = new mysqli("localhost", "root", "", "crud_dasar");
  $data_nama = $_POST["nama"];
  $data_alamat = $_POST["alamat"];
  $data_asal = $_POST["asal"];

  if (isset($_FILES["gambar"])) {
    $ekstensi_gambar_diperbolehkan = array('jpg', 'png', 'jpeg');
    $data_nama_gambar = $_FILES["gambar"]["name"];
    $data_ukuran_gambar = $_FILES["gambar"]["size"];
    $data_gambar_tmp = $_FILES["gambar"]["tmp_name"];

    $x = explode('.', $data_nama_gambar);
    $ekstensi_gambar = strtolower(end($x));
    if (in_array($ekstensi_gambar, $ekstensi_gambar_diperbolehkan) === true) {
      if ($data_ukuran_gambar < 1044070) {
        unlink("file-gambar/" . $data["data_gambar"]);
        move_uploaded_file($data_gambar_tmp, 'file-gambar/' . $data_nama_gambar);

        $hasil = mysqli_query($connect, "UPDATE seluruh_data SET data_nama = '$data_nama', data_alamat = '$data_alamat', data_asal = '$data_asal', data_gambar = '$data_nama_gambar' WHERE id = $id");

        if ($hasil) {
          echo "alert('Berhasil mengupdate data! (dengan gambar)'); document.location.href = 'index.php';";
        } else {
          echo "alert('Gagal'); document.location.href = 'update.php';";
        }
      } else {
        echo "alert('Ukuran gambar terlalu besar!'); document.location.href = 'update.php';";
      }
    } else {
      mysqli_query($connect, "UPDATE seluruh_data SET data_nama = '$data_nama', data_alamat = '$data_alamat', data_asal = '$data_asal' WHERE id = $id");

      echo "alert('Berhasil mengupdate data! (tanpa gambar)'); document.location.href = 'index.php';";
    }
  }
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
  <!-- <?php echo "<img src='file-gambar/" . $data['data_gambar'] . "'>"; ?> -->
  <h2>Edit Data <small>CRUD</small></h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <label for="nama">Nama: </label>
    <input type="text" name="nama" id="nama" placeholder="Nama" value="<?= $data["data_nama"]; ?>"><br>
    <label for="alamat">Alamat: </label>
    <input type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?= $data["data_alamat"]; ?>"><br>
    <label for="asal">Asal: </label>
    <input type="text" name="asal" id="asal" placeholder="Asal" value="<?= $data["data_asal"]; ?>"><br>
    <label for="gambar">Gambar: </label>
    <input type="file" name="gambar" id="gambar"><br>
    <button type="submit" name="submit">Kirim</button>
  </form>
  <p><small>* diupload tanpa gambar jika ekstensi gambarnya selain jpg, jpeg dan png!</small></p>
  <a href="index.php"><button>Kembali</button></a>
</body>

</html>