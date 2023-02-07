<?php

include "conn.php";

// echo $_POST['Id_table'];
// echo $_POST['tableName'];

try {
    $conn = connectionDb();
    $statement = $conn->prepare("update pfe.table set Name = ? where Id_table= ?");
    $statement->bindParam(1, $_POST['tableName']);
    $statement->bindParam(2, $_POST['Id_table']);
    $statement->execute();

  } catch (PDOException $e) {
      echo $e;
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);

?>