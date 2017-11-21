<html>
<head>
<?
include "../inc/config.inc.php";
include "config.inc.php";
$board = $_REQUEST["board"];
$offset = $_REQUEST["offset"];
$point = $_REQUEST["point"];
$keyword = $_REQUEST["keyword"];
?>
<title>테스트 게시판</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="STYLESHEET" type="text/css" href="board_style.css">
</head>
<body>

<?
if (!$offset) { 
	$offset=0; 
}
$sql = "select id from $board where familly=0";
if($point){
	$sql .= " and $point like '%$keyword%' ";
}
$num_result=mysql_query($sql);
$num=mysql_num_rows($num_result);

$no = $num+1-$offset;
$today = date("Y-m-d");
$day = date("m/d");
?>

<center>
<form action="list.php?board=<?=$board ?>" method="post" name="search">

<table border="0" width="88%" style="border-width:1px; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846" height="19">
            <p>&nbsp;&nbsp;total : <?=$num ?>
            </font></p>
        </td>
        <td width="118" height="19">
            <p>today : <?=$day ?></font></p>
        </td>
    </tr>
    <tr>
        <td colspan="2" align=center>
			<table border=1 width=88%>
				<tr>
					<th align=center width=5% height=20 >번호</td>
					<th align=center width=61% >제목</td>
					<th align=center width=10% >이름</td>
					<th align=center width=12% >날짜</td>
					<th align=center width=7% >조회수</td>
				</tr>
<?
$sql = "select * from $board where familly=0 ";
if($point){
	$sql .= " and $point like '%$keyword%' ";
}
$sql .= " order by mother desc, sequence asc limit $offset,$limit";
$result=mysql_query($sql);

while($row=mysql_fetch_array($result)){

	$wday=explode(" ",$row[wdate]);				//게시물 생성일자
	$no = $no - 1;								//게시물 번호
	$subject=htmlspecialchars($row[subject]);	//게시물 제목
	$name=htmlspecialchars($row[name]);			//게시물 작성자 이름
	$comment=htmlspecialchars($row[comment]);	//게시물 내용
	$step = $row[step];							//게시물 계층 레벨
	$id = $row[id];								//게시물 아이디

	echo "
		<tr onMouseOver=this.style.backgroundColor='gainsboro' onMouseOut=this.style.backgroundColor='' onclick=self.location.href='read.php?board=$board&id=$id'>
			<td align=center width=5%><font size=2 color=$list_font>$id</td>
			<td width=61%>
	";
		
	for ($a=0 ; $a < $step ; $a++	){
		echo "&nbsp;&nbsp;";
	}
	
	echo "<a href=read.php?board=$board&id=$id title=\"$comment\">$subject</a>";
	if ($row[familly_num] != 0)	{
		echo "&nbsp;<font size=1 color=gray>[$row[familly_num]]";
	}
	//게시물 생성 일자와 오늘 일자와 같다면 new 이미지를 앞에 붙인다.
	if ($wday[0] == $today ) 	{ 
		echo "&nbsp;<img src=new.gif>	";	
	}

	echo "</td><td align=center width=10%>";

	if (!$row[email])	{
		echo $name;
	}else{
		echo "<a href=mailto:$row[email]>$name</a>";
	}

	echo "
			</td>
			<td align=center width=12%>$wday[0]</td>
			<td align=center width=7%>$row[see]</td>
		</tr>
	";

}
$pages=intval($num/$limit) + 1 ;
if ($num%$limit == 0)	{ $pages = $pages-1; }

mysql_close();
?>
		</table>

<table border=0>
	<tr>
		<td width=560 align=center><p><font size=2>
			<a href=list.php?board=<?=$board?> style=\"font-size : 8pt;\">[1]</a>
<?
	for ($a=2;$a<$pages+1;$a++)	{
		$b = $b + $limit;
		echo "<a href=list.php?board=$board&offset=$b style=\"font-size : 8pt;\">[$a]</a>";
	}
?>
		</p></td>
		<td width=130 align=right><font size=2 color=<?=$list_font ?>></td>
	</tr>
</table>
<font color=<?=$list_font ?> size=2 >
<input type=radio name=point value=name>이름
<input type=radio name=point value=subject checked>제목
<input type=radio name=point value=comment>내용
<input type=text name=keyword id="keyword" class=box size=10 maxlength=15>
<input type=submit value=find class=submit>
<br>
</form>
        </td>
    </tr>
    <tr>
        <td height="21">
            <p align="left">
            <font size="1" face="����" >&nbsp;
            <a href="http://eluka22.dothome.co.kr" target="_blank" style="font-size:8pt">웹디자인</a></font>
            </p>
        </td>
        <td height="21">
          <p align="left">
            <a href="write.php?board=<?=$board ?>">write</a> | 
            <a href="list.php?board=<?=$board ?>">list</a></font>
          </p>
        </td>
    </tr>
</table>
<script language="JavaScript">
	$(document).ready(function(){
		$("#keyword").focus();
	})
</script>
</body>
</html>
