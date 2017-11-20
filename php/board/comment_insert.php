<?
include "../inc/config.inc.php";
$name = $_REQUEST["name"];
$comment = $_REQUEST["comment"];
$passwd = $_REQUEST["passwd"];
$id = $_REQUEST["id"];
$board = $_REQUEST["board"];
$remote_ip = $_SERVER['REMOTE_ADDR'];
if ($name == '' || $comment == '' || $passwd == '')	{
?>
<script>
	alert ('내용을 기입하세요.');
	history.go(-1);
</script>
<?
exit;
}

$dbinsert = "insert into $board (name,passwd,comment,wdate,ip,familly) ".
						"values ('$name','$passwd','$comment',now(),'$remote_ip',$id)";
$result=mysql_query($dbinsert, $db);

$result=mysql_query("select familly_num from $board where id=$id");
$row=mysql_fetch_array($result);
$row[0]=$row[0] + 1;

$dbup = "update $board set familly_num=$row[0] where id=$id";
$result=mysql_query($dbup, $db);

mysql_close($db);

echo ("<meta http-equiv='Refresh' content='0; URL=read.php?board=$board&id=$id'>");
?>
