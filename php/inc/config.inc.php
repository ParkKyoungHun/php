<?
header("Content-Type: text/html; charset=utf-8");
$host="localhost";
$user="redfila";     
$password="r1r2r3";   
$database="redfila";

$db=mysql_connect("$host","$user","$password");
mysql_select_db("$database",$db);
?>
