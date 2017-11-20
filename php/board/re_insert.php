<?
include "../inc/config.inc.php";

if ($name == '' || $comment == '' || $passwd == '' || $subject == '')	{
echo ("
<script>
	alert ('������ �����ϼ���.');
	history.go(-1);
</script>
");
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
						"('$name','$email','$homepage','$passwd','$subject','$comment','$html','$upfile_name','$upfile_type','$upfile_size',now(),'$REMOTE_ADDR',0,$mother,0,0,$step,$row[0])";
$result=mysql_query($dbinsert, $db);

if ($upfile_name)	{
copy($upfile,"..//..//data//$upfile_name");
}	

}	else	{
echo ("
  <script>
  alert('���Ͼ��ε�� �׸����ϸ� �����մϴ�.')
  history.go(-1)
  </script>	");


}
mysql_close($db);

echo ("<meta http-equiv='Refresh' content='0; URL=list.php?board=$board'>");

?>
