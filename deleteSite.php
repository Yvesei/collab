<?php

include "conn.php";


$conn = connectionDb();
$statement = $conn->prepare("delete from pfe.site where Id_site = ?");
$statement->bindParam(1, $_GET['Id_site']);
$statement->execute();    

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>