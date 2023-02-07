<?php
function connectionDb()
{
    $hname = 'localhost';
    $uName = 'root';
    $db_name = 'pfe';
    $pass = '';

    try {
        $conn = new PDO("mysql:host=$hname;db_name=$db_name", $uName, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'connected';
        return $conn;
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo 'connection failed';
    }
}
?>