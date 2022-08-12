<?php 

require_once './app/db.php';

$sql_to = "SELECT * FROM students WHERE id=$_GET[id]";

$data = $connection -> query($sql_to);

$fdata = $data -> fetch_assoc();

$photos = $fdata['photo'];

unlink($photos);

// sql to delete a record
$sql = "DELETE FROM students WHERE id=$_GET[id]";

$connection -> query($sql);

header("Location: table.php");

?>