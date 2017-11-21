<?
include "../inc/config.inc.php";
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
$upfile_type = $file["type"];
$upfile_size = $file["szie"];

if ($name == '' || $comment == '' || $passwd == '' || $subject == '')	{
?>
<script>
	alert ('내용을 기입하세요.');
	history.go(-1);
</script>
<?
exit;
}

if ($row[upfile_type] ==	'image/gif'  or $row[upfile_type] == 'image/pjpeg' or $row[upfile_type] == 'image/bmp' or $row[upfile_type] == 'image/x-png' or $row[upfile_type] == '' )
{

$step = $step+1;

$result=mysql_query("select max(sequence) from $board where mother=$mother");
$row=mysql_fetch_array($result);
$row[0]=$row[0] + 1;

if ($html)	{
$html = 'yes';
} else {
$html = 'no';
}

$dbinsert = "insert into $board (name,email,homepage,passwd,subject,comment,html,upfile_name,upfile_type,upfile_size,wdate,ip,see,mother,familly,familly_num,step,sequence) values ".
						"('$name','$email','$homepage','$passwd','$subject','$comment','$html','$upfile_name','$upfile_type','$upfile_size',now(),'$remote_ip',0,$mother,0,0,$step,$row[0])";
$result=mysql_query($dbinsert, $db);

if ($upfile_name)	{
  if(move_uploaded_file($_FILES["upfile"]["tmp_name"], "..//data//$upfile_name"))
    echo "success";
  else
    die("fail2");
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
