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
$file = $_FILES['upfile'];
$remote_ip = $_SERVER['REMOTE_ADDR'];
if ($name == '' || $comment == '' || $passwd == '' || $subject == '')	{
?>
<script>
	alert ('내용을 기입하세요.');
	history.go(-1);
</script>
<?
exit;
}

if ($file["type"] ==	'image/gif'  or $file["type"] == 'image/jpeg' or $file["type"] == 'image/bmp' or $file["type"] == 'image/x-png' or $file["type"] == '' )
{

  $a = date("dms");
  $upfile_name = $a.$file["name"];

  $result=mysql_query("select max(mother) from $board");
  $row=mysql_fetch_array($result);
  $row[0]=$row[0] + 1;

  if ($file["size"] == 0) {
    $upfile_name = '';
  }

  if ($html)	{
    $html = 'yes';
  } else {
    $html = 'no';
  }

  $dbinsert = "insert into $board (name,email,homepage,passwd,subject,comment,html,upfile_name,upfile_type,upfile_size,wdate,ip,see,familly,familly_num,mother,step,sequence) ".
              "values ('$name','$email','$homepage','$passwd','$subject','$comment','$html','$upfile_name','$file[type]','$file[size]',now(),'$remote_ip',0,0,0,$row[0],0,0)";
  $result=mysql_query($dbinsert, $db);

  if ($file["size"] > 0)	{
    copy($upfile,"..//data//$upfile_name");
  }	

}	else	{
?>
  <script>
    alert('파일업로드는 그림파일만 가능합니다.');
    history.go(-1);
  </script>
<?
}

mysql_close($db);

echo ("<meta http-equiv='Refresh' content='0; URL=list.php?board=$board'>");
?>
