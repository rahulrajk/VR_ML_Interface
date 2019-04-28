<?php
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","")or die("Error");
mysql_select_db("sih")or die("Database error");
?>