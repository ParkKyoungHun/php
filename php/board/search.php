<?
include "../inc/config.inc.php";
include "config.inc.php";
$day = date("m/d");
?>
<html><head>
<title><?=$title_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="STYLESHEET" type="text/css" href="toziboard.css">
</head>
<body bgcolor=<?=$bgcolor ?>>
<?
if ($keyword == '������� ¯�̾�!')	{
echo "
<script>
alert ('�����Դϴ�! ^o^V');
</script>
";
}

if ($keyword=="")	{	echo ("
  <script>
  alert('�˻�� �Է��ϼ���.')
  history.go(-1)
  </script>	");
}
 $dbsearch="select * from $board where familly=0 and $point like '%$keyword%' order by mother desc, sequence asc";
 $query=mysql_query($dbsearch,$db);
 $list=mysql_num_rows($query);
 $num=mysql_num_rows($query);
?>
<center>
<!-- �ٱ� �Դϴ� -->
<table border="0" width="88%" style="border-width:1px; border-color:<?=$table_out ?>; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846"  height="19">
            <p><font size="2" face="����" >&nbsp;&nbsp;Search : <?=$num ?>
            </font></p>
        </td>
        <td width="118"  height="19">
            <p><font face="����ü" size="2" >today : <?=$day ?></font></p>
        </td>
    </tr>
    <tr>
        <td colspan="2" align=center>
<!-- ���� ���� -->
<br>
<table border=0 width=88%>
	<tr>
		<td align=center width=5% height=20 bgcolor=<?=$table_in ?>><font size=2 face=���� color=<?=$up_font ?>>no</td>
		<td align=center width=61% bgcolor=<?=$table_in ?>><font size=2 face=���� color=<?=$up_font ?>>subject</td>
		<td align=center width=10% bgcolor=<?=$table_in ?>><font size=2 face=���� color=<?=$up_font ?>>name</td>
		<td align=center width=12% bgcolor=<?=$table_in ?>><font size=2 face=���� color=<?=$up_font ?>>date</td>
		<td align=center width=7% bgcolor=<?=$table_in ?>><font size=2 face=���� color=<?=$up_font ?>>hit</td>
	</tr>
</table>
<?
	$num = $num +1;
	
if($list)
{
 while($row=mysql_fetch_array($query))
{
/* �˻��� �ش�� �κ��� �ٸ� ������ ó���մϴ�. */ 
  $subject=htmlspecialchars($row[subject]); 
  $subject=str_replace(" ","&nbsp; ",$subject);
  $subject=str_replace("$keyword","<font color=black face=���� size=2>$keyword</font>",$subject);
  $name=htmlspecialchars($row[name]); 
  $name=str_replace("$keyword","<font color=black face=���� size=2>$keyword</font>",$name);
  $day=explode(" ",$row[wdate]);

	$num = $num - 1;
?>

<table border=0 width=88%>
  <tr onMouseOver=this.style.backgroundColor='gainsboro' onMouseOut=this.style.backgroundColor='' onclick=self.location.href='read.php?board=<?=$board ?>&id=<?=$row[id]?>'>
  	<td align=center width=5%><font size=2 face=���� color=<?=$list_font ?>><?=$num ?></td>
    <td width=61%>
    
<?
	for ($a=0 ; $a < $row[step]  ; $a++	){
	echo "&nbsp;&nbsp;";
	}

	echo "<font color=$list_font>$subject</a></td><td width=10% align=center>";
	
if (!$row[email])	{
		echo "<font color=$list_font face=����>$row[name]";
		}	else	{
		echo "<a href=mailto:$row[email]>$row[name]</a>";
		}
?>  
    <td width=12% align=center><font color=<?=$list_font?>><?=$day[0] ?></td>
    <td width=7% align=center><font color=<?=$list_font ?>><?=$row[see]?></td>
  </tr>
 </table>
<?
}
}else{
?>
<!-- �˻��� �Խù��� ���� �� -->
<font color=<?=$list_font ?> size=2 face=����><a href="javascript:history.go(-1)">�˻��� �Խù��� �����ϴ�.</a></font>
<?
}
mysql_close($db);
?>
<form action=search.php?board=<?=$board ?> method=post name=search>
<font color=<?=$list_font ?> size=2 face=����>
<input type=radio name=point value=name>�̸�
<input type=radio name=point value=subject checked>����
<input type=radio name=point value=comment>����
<input type=text name=keyword class=box size=10 maxlength=15>
<input type=submit value=find class=submit>
<br><br>
<!-- ���� ���� -->
        </td>
    </tr>
    <tr>
        <td  height="21">
            <p align="left">
            <font size="1" face="����" >&nbsp;
            copyright �� <a href="http://tozigy.com" target="_blank">
            tozigy.com</a>. All rights reserved.</a></font>
            </p>
        </td>
        <td  height="21">
            <p align="left"><a href="write.php?board=<?=$board ?>"><font size="2" face="����ü" >write</a> 
            | <a href="list.php?board=<?=$board ?>"><font size="2" face="����ü" >list</a></font></p>
        </td>
    </tr>
</table>
<!-- �ٱ� ���� -->
</form>
<script>
	document.search.keyword.focus();
</script>
</body></html>
