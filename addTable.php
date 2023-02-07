<?php

include "conn.php";

try {
    $conn = connectionDb();
    $statement = $conn->prepare("insert into pfe.table values(NULL, ?)");

    $statement->bindParam(1, $_POST['tableName']);
    $statement->execute();

    // $Results = $statement->fetchall();
} catch (PDOException $e) {
    echo $e;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>