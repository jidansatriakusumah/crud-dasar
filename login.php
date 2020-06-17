<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");

if (isset($_POST["login"])) {
  $connect = new mysqli("localhost", "root", "", "crud_dasar");

  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  if ($username == 'admin' && $password == '12345') {
    $_SESSION["login"] = true;
    header("Location: index.php");
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
  <title>Login to CRUD_Dasar</title>
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
    </ul>
  </form>
</body>

</html>