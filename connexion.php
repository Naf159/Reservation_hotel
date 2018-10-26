<?php 

mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );
mysql_query("SET NAMES UTF8");
?>