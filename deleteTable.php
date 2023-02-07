<?php

include "conn.php";

try {
    $conn = connectionDb();
    $statement = $conn->prepare("delete from pfe.table where Id_table = ?");
    $statement->bindParam(1, $_GET['Id_table']);
    $statement->execute();

  } catch (PDOException $e) {
      echo $e;
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);

?>