<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");

if (isset($_POST["login"])) {
  $connect = new mysqli("localhost", "root", "", "crud_dasar");

  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);

  $result = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username'");
  $data_admin = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) == 1) {
    if (password_verify($password, $data_admin['password'])) {
      $_SESSION["login"] = true;
      // header("Location: index.php");
    }
  } else {
    echo "<script>alert('Username atau password salah!');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login - CRUD_Dasar</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <h2>Login</h2>
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
          <input type="password" name="password" required>
        </label>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
      <li>
        <a href="registrasi.php">Registrasi</a>
      </li>
    </ul>
  </form>
</body>

</html>