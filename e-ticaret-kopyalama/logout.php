<?php
ob_start();
session_start();

session_destroy();
Header("Location:index.php?durum=exit");

?>