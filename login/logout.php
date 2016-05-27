<?php session_start();

if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
}
?>
<?php
$URL="home.php";
header ("Location: $URL");
?>