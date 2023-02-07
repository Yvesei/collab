<?php 
session_start();
 

// php code to Insert data into mysql database from input text
if(isset($_POST['submit']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "pfe";
    
    // get values form input text and number

   
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

    $query = "UPDATE `User` SET 
    
    Name='$_POST[name]',
    `Email`='$_POST[email]',
     `Pass`= '$_POST[password]'
     WHERE `user`.`Id_user`=".$_SESSION['ID']." ";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful
    
}


$sql = ("select * from user WHERE Id_user='".$_SESSION['ID']."' ");
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_assoc($result);
$_SESSION['name'] =  $rows['Name'];
$_SESSION['admin'] =  $rows['Admin'];
$_SESSION['ID'] =  $rows['Id_user'];
$_SESSION['email'] = $rows['Email'];
$_SESSION['password'] = $rows['Password'];

header("location:/project/public/profile.php");
?>







