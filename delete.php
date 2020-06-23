<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

$connect = new mysqli("localhost", "root", "", "crud_dasar");

$id = $_GET["id"];

$result = mysqli_query($connect, "DELETE FROM seluruh_data WHERE data_id=$id");

echo "<script>document.location.href = 'index.php'</script>";
