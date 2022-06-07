<?php include "includes/header.php";?>
<?php
unset($_SESSION['admin']);
$_SESSION['message'] = "Logged Out Successfully !";
header("Location:login.php");
?>