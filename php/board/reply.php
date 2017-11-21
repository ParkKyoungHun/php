<?
include "../inc/config.inc.php";  //  데이터베이스 연결 설정 파일 포함
include "config.inc.php";
$day = date("m/d");
$board = $_REQUEST["board"];
$id = $_REQUEST["id"];
$mother = $_REQUEST["mother"];
$step = $_REQUEST["step"];
$sequence = $_REQUEST["sequence"];

?>
<html>
<head>
<title>답글작성</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="STYLESHEET" type="text/css" href="board_style.js.css">
<script language="javascript" src="board_script.js"></script>
</head>

<body>
<center>
<table border="0" width="85%" style="border-width:1px; border-color:<? echo $table_out ?>; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846" bgcolor="<? echo $table_out ?>" height="19">
            <p><font size="2" face="돋움" color="white">&nbsp;&nbsp;
            </font></p>
        </td>
        <td width="118" bgcolor="<? echo $table_out ?>" height="19">
            <p><font face="돋움체" size="2" color="white">today : <? echo $day ?></font></p>
        </td>
    </tr>
    <tr>
        <td height="199" colspan="2" align=center>
<form action=re_insert.php?board=<? echo $board ?>&id=<? echo $id ?>&mother=<? echo $mother?>&step=<?echo $step?>&sequence=<? echo $sequence?> method=post name=tozzic onSubmit="return Write_Check()" enctype="multipart/form-data">
<br>
<table border=0  cellpadding=1 cellspacing=1>
	<tr>
		<td width=565 height=20 align=center bgcolor=<? echo $table_in ?>>
			<font color=<? echo $up_font ?>><B>답글쓰기</B></font>
		</td>
	</tr>

<?
$result=mysql_query("select * from $board where id=$id");
$row=mysql_fetch_array($result);
$name=htmlspecialchars($row[name]);
$subject=htmlspecialchars($row[subject]);
$comment=htmlspecialchars($row[comment]);
?>
	<tr>
		<td height=20>&nbsp;
<!-- 글쓰는 폼의 시작 -->
<TABLE border=0 align=center>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<? echo $list_font ?>>이름</TD>
		<TD width=300 height=20 align=left><font size=2 color=<? echo $list_font ?>><input type=text name=name size=20 maxlength=25 class=box></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<? echo $list_font ?>>이메일</TD>
		<TD height=20 align=left><INPUT type=text name=email size=20 maxlength=25 class=box></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<? echo $list_font ?>>비밀번호</TD>
		<TD height=20 align=left><INPUT type=password name=passwd size=8 maxlength=8 class=box>(수정,삭제시 반드시 필요)</TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<? echo $list_font ?>>제 목</td>
		<TD height=20 align=left><INPUT type=text name=subject size=50 maxlength=50 value="
<?
$subject = str_replace(chr(34),"&#34",$subject);

echo "Re:".$subject;
?>"  class=box>&nbsp;&nbsp;&nbsp;&nbsp;html<input type=checkbox name=html>
		</TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<? echo $list_font ?>>내용</TD>
		<TD height=20 align=left>
<TEXTAREA name=comment cols=65 rows=15  class=box>
:::: <? echo $name ?>의 글 ::::
<? echo $comment ?>
</TEXTAREA>
		</TD>
	</TR>
	<tr>
		<td><font size=2 color=<? echo $list_font ?>>첨부파일</td>
		<td><input type=file name=upfile size=50 maxlength=255 class=box readonly><br><font color=<? echo $list_font ?>>그림파일만 업로드 할 수 있습니다.</td>
	</tr>
	<TR>
		<TD align=center colspan=2>
			<input type=submit value=save class=submit>
			<input type=reset value=cancel class=submit>
			<input type=button value=back class=submit onclick='javascript:history.go(-1)'>
		</TD>
	</TR>
</TABLE>
<!-- 글쓰는 폼의 끝 -->
</td>       
</tr>
</table></form>
<!-- 내부 종료 -->
        </td>
    </tr>
    <tr>
        <td bgcolor="<? echo $table_out ?>" height="21">
            <p align="left">
            <font size="1" face="굴림" color="white">&nbsp;
            <a href="http://tozigy.com" target="_blank" style="font-size:8pt;color:white;">copyright ⓒ tozigy.com. All rights reserved.</a></font>
            </p>
        </td>
        <td bgcolor="<? echo $table_out ?>" height="21">
            <p align="left"><a href="write.php?board=<? echo $board ?>">write</a> 
            | <a href="list.php?board=<? echo $board ?>">list</a></font></p>
        </td>
    </tr>
</table>
<!-- 바깥 종료 -->
</center>
<P>
<script>
$("#name.focus();
</script>
</body>
</html>
