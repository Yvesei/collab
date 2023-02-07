<?php 
include "conn.php";
session_start();
 
if(isset($_GET['Id_user'])) {

try {
    $conn = connectionDb();
    $statement = $conn->prepare("delete from pfe.user where Id_user = ?");
    $statement->bindParam(1, $_GET['Id_user']);
    $statement->execute();

} catch (PDOException $e) {
    echo $e;
}

}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>