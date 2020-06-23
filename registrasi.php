<?php

$connect = new mysqli("localhost", "root", "", "crud_dasar");

if (isset($_POST["registrasi"])) {
  $connect = new mysqli("localhost", "root", "", "crud_dasar");

  $username = mysqli_escape_string($connect, strtolower($_POST["username"]));
  $password1 = mysqli_escape_string($connect, $_POST["password1"]);
  $password2 = mysqli_escape_string($connect, $_POST["password2"]);

  // print_r($username);
  // print_r($password1);
  // print_r($password2);


  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>alert('Username atau password tidak boleh kosong!'); document.location.href = 'registrasi.php';</script>";
    // header("Location: registrasi.php");
  }

  $result = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username'");
  if (mysqli_num_rows($result) == 1) {
    echo "<script>alert('Username sudah ada, silahkan pilih username yang lain!'); document.location.href = 'registrasi.php';</script>";
    // header("Location: registrasi.php");
  }

  if (strlen($password1) < 5) {
    echo "<script>alert('Password terlalu pendek!'); document.location.href = 'registrasi.php';</script>";
  }

  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  $add = mysqli_query($connect, "INSERT INTO admin (username, password) VALUES ('$username', '$password_baru')");
  echo "<script>alert('Selamat! Anda berhasil registrasi!'); document.location.href = 'login.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registrasi - CRUD Dasar</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <h2>Registrasi</h2>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username:
          <input type="text" name="username" autocomplete="off" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Password:
          <input type="password" name="password1" required>
        </label>
      </li>
      <li>
        <label>
          Konfirmasi password:
          <input type="password" name="password2" required>
        </label>
      </li>
      <li>
        <button type="submit" name="registrasi">Registrasi</button>
      </li>
      <li>
        <a href="login.php">Kembali</a>
      </li>
    </ul>
  </form>
</body>

</html>