<?
include "../inc/config.inc.php";
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$comment = $_REQUEST["comment"];
$passwd = $_REQUEST["passwd"];
$subject = $_REQUEST["subject"];
$board = $_REQUEST["board"];
$html = $_REQUEST["html"];
$email = $_REQUEST["email"];
$homepage = $_REQUEST["homepage"];
$upfile_name = $_REQUEST["upfile_name"];
$homepage = $_REQUEST["homepage"];
$mother = $_REQUEST["mother"];
$step = $_REQUEST["step"];
$file = $_FILES['upfile'];
$remote_ip = $_SERVER['REMOTE_ADDR'];

if ($comment == '' || $passwd == '' || $subject == '')	{
echo ("
<script>
	alert ('내용을 기입하세요.');
	history.go(-1);
</script>
");
exit;
}

if ($upfile_type ==	'image/gif'  or $upfile_type == 'image/pjpeg' or $upfile_type == 'image/bmp' or $upfile_type == 'image/x-png' or $upfile_type == 0 )
{

$result=mysql_query("select passwd,upfile_name from $board where id=$id", $db);
$row=mysql_fetch_array($result);

 	if (($passwd==$row[passwd]) || ($passwd==$admin_passwd))
 	{

		if ($html)	{
		$html = 'yes';
		} else {
		$html = 'no';
		}
		
	$dbup = "update $board set name='$name',subject='$subject',html='$html',email='$email',homepage='$homepage',comment='$comment' where id=$id";
	$result=mysql_query($dbup, $db);

			if ($del_file)	{
			unlink("..//..//data//$row[upfile_name]");
			$dbup = "update $board set upfile_name='',upfile_size='',upfile_type='' where id=$id";
			$result=mysql_query($dbup, $db);
			}
			
			if ($upfile_size > 0)	{
			unlink("..//..//data//$row[upfile_name]");
			$a = date("dms");
			$upfile_name = $a.$upfile_name;
			$dbup = "update $board set upfile_name='$upfile_name',upfile_size='$upfile_size',upfile_type='$upfile_type' where id=$id";
			$result=mysql_query($dbup, $db);
			copy($upfile,"..//..//data//$upfile_name");
			}
	
	}	else	{
	
	echo ("
  <script>
  alert('비밀번호가 틀렸습니다. $passwd , $row[passwd]')
  history.go(-1)
  </script>
  ");
  exit;

 	}
 
}	else	{
echo ("
  <script>
  alert('파일업로드는 그림파일만 가능합니다.')
  history.go(-1)
  </script>	");


}
	
mysql_close($db);

echo ("<meta http-equiv='Refresh' content='0; URL=list.php?board=$board'>");

?>
