<?
include "../inc/config.inc.php";
include "config.inc.php";
$day = date("m/d");
?>
<html><head>
<title><? echo $title_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="STYLESHEET" type="text/css" href="board_style.js.css">
</head>
<body bgcolor=<? echo $bgcolor ?>>
<?
if ($keyword == '토지기는 짱이야!')	{
echo "
<script>
alert ('정답입니다! ^o^V');
</script>
";
}

if ($keyword=="")	{	echo ("
  <script>
  alert('검색어를 입력하세요.')
  history.go(-1)
  </script>	");
}
 $dbsearch="select * from $board where familly=0 and $point like '%$keyword%' order by mother desc, sequence asc";
 $query=mysql_query($dbsearch,$db);
 $list=mysql_num_rows($query);
 $num=mysql_num_rows($query);
?>
<center>
<!-- 바깥 입니다 -->
<table border="0" width="88%" style="border-width:1px; border-color:<? echo $table_out ?>; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846" bgcolor="<? echo $table_out ?>" height="19">
            <p><font size="2" face="돋움" color="white">&nbsp;&nbsp;Search : <? echo $num ?>
            </font></p>
        </td>
        <td width="118" bgcolor="<? echo $table_out ?>" height="19">
            <p><font face="돋움체" size="2" color="white">today : <? echo $day ?></font></p>
        </td>
    </tr>
    <tr>
        <td colspan="2" align=center>
<!-- 내부 시작 -->
<br>
<table border=0 width=88%>
	<tr>
		<td align=center width=5% height=20 bgcolor=<? echo $table_in ?>><font size=2 face=돋움 color=<? echo $up_font ?>>no</td>
		<td align=center width=61% bgcolor=<? echo $table_in ?>><font size=2 face=돋움 color=<? echo $up_font ?>>subject</td>
		<td align=center width=10% bgcolor=<? echo $table_in ?>><font size=2 face=돋움 color=<? echo $up_font ?>>name</td>
		<td align=center width=12% bgcolor=<? echo $table_in ?>><font size=2 face=돋움 color=<? echo $up_font ?>>date</td>
		<td align=center width=7% bgcolor=<? echo $table_in ?>><font size=2 face=돋움 color=<? echo $up_font ?>>hit</td>
	</tr>
</table>
<?
	$num = $num +1;
	
if($list)
{
 while($row=mysql_fetch_array($query))
{
/* 검색에 해당된 부분은 다른 색으로 처리합니다. */ 
  $subject=htmlspecialchars($row[subject]); 
  $subject=str_replace(" ","&nbsp; ",$subject);
  $subject=str_replace("$keyword","<font color=black face=돋움 size=2>$keyword</font>",$subject);
  $name=htmlspecialchars($row[name]); 
  $name=str_replace("$keyword","<font color=black face=돋움 size=2>$keyword</font>",$name);
  $day=explode(" ",$row[wdate]);

	$num = $num - 1;
?>

<table border=0 width=88%>
  <tr onMouseOver=this.style.backgroundColor='gainsboro' onMouseOut=this.style.backgroundColor='' onclick=self.location.href='read.php?board=<? echo $board ?>&id=<? echo $row[id]?>'>
  	<td align=center width=5%><font size=2 face=돋움 color=<? echo $list_font ?>><? echo $num ?></td>
    <td width=61%>
    
<?
	for ($a=0 ; $a < $row[step]  ; $a++	){
	echo "&nbsp;&nbsp;";
	}

	echo "<font color=$list_font>$subject</a></td><td width=10% align=center>";
	
if (!$row[email])	{
		echo "<font color=$list_font face=돋움>$row[name]";
		}	else	{
		echo "<a href=mailto:$row[email]>$row[name]</a>";
		}
?>  
    <td width=12% align=center><font color=<? echo $list_font?>><? echo $day[0] ?></td>
    <td width=7% align=center><font color=<? echo $list_font ?>><? echo $row[see]?></td>
  </tr>
 </table>
<?
}
}else{
?>
<!-- 검색된 게시물이 없을 때 -->
<font color=<? echo $list_font ?> size=2 face=돋움><a href="javascript:history.go(-1)">검색된 게시물이 없습니다.</a></font>
<?
}
mysql_close($db);
?>
<form action=search.php?board=<? echo $board ?> method=post name=search>
<font color=<? echo $list_font ?> size=2 face=돋움>
<input type=radio name=point value=name>이름
<input type=radio name=point value=subject checked>제목
<input type=radio name=point value=comment>내용
<input type=text name=keyword class=box size=10 maxlength=15>
<input type=submit value=find class=submit>
<br><br>
<!-- 내부 종료 -->
        </td>
    </tr>
    <tr>
        <td bgcolor="<? echo $table_out ?>" height="21">
            <p align="left">
            <font size="1" face="굴림" color="white">&nbsp;
            copyright ⓒ <a href="http://tozigy.com" target="_blank">
            tozigy.com</a>. All rights reserved.</a></font>
            </p>
        </td>
        <td bgcolor="<? echo $table_out ?>" height="21">
            <p align="left"><a href="write.php?board=<? echo $board ?>">write</a> 
            | <a href="list.php?board=<? echo $board ?>">list</a></font></p>
        </td>
    </tr>
</table>
<!-- 바깥 종료 -->
</form>
<script>
	document.search.keyword.focus();
</script>
</body></html>
