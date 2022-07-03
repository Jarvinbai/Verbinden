<?php
session_start();
unset($_SESSION["CID"]);
unset($_SESSION["ID"]);
session_destroy();
header("location:index.php");
?>