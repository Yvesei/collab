<?php
session_start();
session_unset();
session_destroy();


header('location:/project/public/pages/login.php');

?>