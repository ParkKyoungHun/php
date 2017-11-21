<?

include "../inc/config.inc.php";
$board = $_REQUEST["board"];
$id = $_REQUEST["id"];
$passwd = $_REQUEST["passwd"];


$result=mysql_query("select passwd,upfile_name from $board where id=$id", $db);
$row=mysql_fetch_array($result);

 if (($passwd==$row[passwd]) || ($passwd==$admin_passwd))
 {

  $dbdel = "delete from $board where id=$id";
  $result=mysql_query($dbdel, $db);
  
  // 어미글이 지워지면, 그 꼬리글도 지워집니다.
  
  $dbdel = "delete from $board where familly=$id";
  $result=mysql_query($dbdel, $db);

	if ($row[upfile_name])	{
	unlink("..//..//data//$row[upfile_name]");
	}
	
 } else  {
 echo ("
  <script>
  alert('비밀번호가 틀렸습니다.')
  history.go(-1)
  </script>
  ");
  exit;
 }

echo ("<meta http-equiv='Refresh' content='0; URL=list.php?board=$board'>");

?>

