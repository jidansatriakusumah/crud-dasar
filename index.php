<?php
session_start();

if (!isset($_SESSION["login"])) {
  echo "<script>alert('Anda harus login terlebih dahulu!'); document.location.href = 'login.php';</script>";
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");
$result = mysqli_query($connect, "SELECT * FROM seluruh_data");

if (isset($_GET["cari"])) {
  $keyword = $_GET["keyword-cari"];
  $connect = new mysqli("localhost", "root", "", "crud_dasar");

  $result = mysqli_query($connect, "SELECT * FROM seluruh_data WHERE data_nama LIKE '%$keyword%' OR data_alamat LIKE '%$keyword%' OR data_asal LIKE '%$keyword%'");
}

?>

<html>

<head>
  <title>CRUD Dasar</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <h1>
    <a href="index.php">CRUD Dasar</a>
  </h1>
  <h2>Tabel</h2>
  <a href="create.php"><button>Buat Data</button></a>
  <a href="logout.php"><button>Logout</button></a>
  <form action="" method="GET">
    <input type="text" placeholder="Masukkan keyword yang ingin dicari..." size="40" name="keyword-cari" autocomplete="off" autofocus id="keyword-cari">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
  </form>
  <div id="data-table">
    <table>
      <tr>
        <thead>
          <th>No</th>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Asal</th>
          <th>Aksi</th>
        </thead>
      </tr>
      <?php $i = 1 ?>
      <?php while ($user_data = mysqli_fetch_array($result)) { ?>
        <tr>
          <tbody>
            <td><?= $i ?></td>
            <td><?php if (!empty($user_data['data_gambar'])) {
                  echo "<img src='file-gambar/" . $user_data["data_gambar"] . "' style='height : 60px;'>";
                }  ?></td>
            <td><?= $user_data["data_nama"]; ?></td>
            <td><?= $user_data["data_alamat"]; ?></td>
            <td><?= $user_data["data_asal"]; ?></td>
            <td>
              <a href="update.php?id=<?= $user_data["data_id"] ?>&data_gambar=<?= $user_data["data_gambar"]; ?>">Ubah</a> |
              <a href="delete.php?id=<?= $user_data["data_id"] ?>&data_gambar=<?= $user_data["data_gambar"]; ?>">Hapus</a>
            </td>
          </tbody>
        </tr>
        <?php $i++; ?>
      <?php } ?>
    </table>
  </div>

  <p>&copy; 2020 by Jidan</p>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>