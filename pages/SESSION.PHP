<?php 



         $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $sql = ("select * from user WHERE Email='".$_SESSION['email']."' ");
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
        $_SESSION['name'] =  $rows['Name'];
        $_SESSION['admin'] =  $rows['Admin'];
        $_SESSION['ID'] =  $rows['Id_user'];
    


?>