<?
include "../inc/config.inc.php";

if ($comment == '' || $passwd == '' || $subject == '')	{
echo ("
<script>
	alert ('������ �����ϼ���.');
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
  alert('��й�ȣ�� Ʋ�Ƚ��ϴ�.')
  history.go(-1)
  </script>
  ");
  exit;

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
