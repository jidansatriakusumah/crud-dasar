<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");
$result = mysqli_query($connect, "SELECT * FROM seluruh_data");

if (isset($_POST["cari"])) {
  $keyword = $_POST["keyword"];
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
  <form action="" method="POST">
    <input type="text" placeholder="Masukkan keyword yang ingin dicari..." size="40" name="keyword" autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>
  <table>
    <tr>
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Asal</th>
        <th>Aksi</th>
      </thead>
    </tr>
    <?php if (empty($result)) { ?>
      <tr>
        <td>
          <p style="color: red; font-style: italic;">Data tidak ditemukan!</p>
        </td>
      </tr>
    <?php } ?>
    <?php $i = 1 ?>
    <?php while ($user_data = mysqli_fetch_array($result)) { ?>
      <tr>
        <tbody>
          <td><?= $i ?></td>
          <td><?= $user_data["data_nama"]; ?></td>
          <td><?= $user_data["data_alamat"]; ?></td>
          <td><?= $user_data["data_asal"]; ?></td>
          <td>
            <a href="update.php?id=<?= $user_data["data_id"] ?>">Ubah</a> |
            <a href="delete.php?id=<?= $user_data["data_id"] ?>">Hapus</a>
          </td>
        </tbody>
      </tr>
      <?php $i++; ?>
    <?php } ?>
  </table>
  <p>&copy; 2020 by Jidan</p>
</body>

</html>