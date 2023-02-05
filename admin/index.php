<?php
ob_start();
header("location:san_pham");
if(!isset($_COOKIE['level']) || ($_COOKIE['level'] == 3))
{ 
header("location: ../khach_hang");
} 
ob_flush();
?>