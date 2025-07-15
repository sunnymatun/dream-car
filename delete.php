<?php

include("connect.php");


$id = $_GET['id'];


$sql = "DELETE FROM datas WHERE id=$id";
$query = mysqli_query($mysqli, $sql);


header("Location:index.php");
?>
