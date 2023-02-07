<?php

$host="localhost";
$user="root";
$password="";
$db="pfe";

    session_start();
    $conn = new mysqli('localhost', $user, $password, $db) or die("unable to connect");

    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        
        $sql = ("select * from user WHERE Email='".$email."' AND Pass='".$password."' limit 1 ");
        $result = mysqli_query($conn, $sql);
        
        
        if(mysqli_num_rows($result)==1){
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $sql = ("select * from user WHERE Email='".$_SESSION['email']."' ");
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);
            $_SESSION['name'] =  $rows['Name'];
            $_SESSION['admin'] =  $rows['Admin'];
            $_SESSION['ID'] =  $rows['Id_user'];

            if($rows['Admin']==1){
                header('location:/project/public/index.php');
            }else{
                header('location:/project/public/tables.php?Id_table=1');
            }
            exit();
        }
        else{

            header('location:/project/public/pages/login-error.php');
            exit();
        }
        }

   
    




    // $sql = ("select * from user WHERE Email='".$_SESSION['email']."' ");
    // $result = mysqli_query($conn, $sql);
    // //fetch
    // $rows = mysqli_fetch_assoc($result);
    // $_SESSION['name'] =  $rows['Name'];
    // $_SESSION['admin'] =  $rows['Admin'];

    // if(isset($_POST['email'])){
    //     $email=$_POST['email'];
    //     $passwd=$_POST['password'];
    
    //     $sql="select * from user WHERE Email='".$email."' AND  Pass='".$passwd."' limit 1";
    
    //     $result = $conn->query($sql);
    
    // }
    



?>

