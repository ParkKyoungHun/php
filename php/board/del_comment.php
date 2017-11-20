<?

include "../inc/config.inc.php";

$result=mysql_query("select passwd from $board where id=$id", $db);
$row=mysql_fetch_array($result);

 if (($passwd==$row[passwd]) || ($passwd==$admin_passwd))
 {
  $dbdel = "delete from $board where id=$id";
  $result=mysql_query($dbdel, $db);
  
  $result=mysql_query("select familly_num from $board where id=$main_id");
	$row=mysql_fetch_array($result);
	$row[0]=$row[0] - 1;

	$dbup = "update $board set familly_num=$row[0] where id=$main_id";
	$result=mysql_query($dbup, $db);

 } else  {
 echo ("
  <script>
  alert('��й�ȣ�� Ʋ�Ƚ��ϴ�.')
  history.go(-1)
  </script>
  ");
  exit;
 }

echo ("<meta http-equiv='Refresh' content='0; URL=read.php?board=$board&id=$main_id'>");

?>

