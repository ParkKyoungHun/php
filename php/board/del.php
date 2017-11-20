<?

include "../inc/config.inc.php";

$result=mysql_query("select passwd,upfile_name from $board where id=$id", $db);
$row=mysql_fetch_array($result);

 if (($passwd==$row[passwd]) || ($passwd==$admin_passwd))
 {

  $dbdel = "delete from $board where id=$id";
  $result=mysql_query($dbdel, $db);
  
  // ��̱��� ��������, �� �����۵� �������ϴ�.
  
  $dbdel = "delete from $board where familly=$id";
  $result=mysql_query($dbdel, $db);

	if ($row[upfile_name])	{
	unlink("..//..//data//$row[upfile_name]");
	}
	
 } else  {
 echo ("
  <script>
  alert('��й�ȣ�� Ʋ�Ƚ��ϴ�.')
  history.go(-1)
  </script>
  ");
  exit;
 }

echo ("<meta http-equiv='Refresh' content='0; URL=list.php?board=$board'>");

?>

