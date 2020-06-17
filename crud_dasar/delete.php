<?php

$connect = new mysqli("localhost", "root", "", "crud_dasar");

$id = $_GET["id"];

$result = mysqli_query($connect, "DELETE FROM seluruh_data WHERE data_id=$id");

header('Location:index.php');

?>