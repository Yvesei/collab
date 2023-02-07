<?php 
include "conn.php";

session_start();
 
try {
    $conn = connectionDb();
    $statement = $conn->prepare("insert into pfe.user values(NULL, ?, ?, ?, 0)");
    $statement->bindParam(1, $_POST['userName']);
    $statement->bindParam(2, $_POST['userEmail']);
    $statement->bindParam(3, $_POST['userPass']);
    $statement->execute();

} catch (PDOException $e) {
    echo $e;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>