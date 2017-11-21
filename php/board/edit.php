<?
include "../inc/config.inc.php";  //  데이터베이스 연결 설정 파일 포함
include "config.inc.php";
$day = date("m/d");
$board = $_REQUEST["board"];
$id = $_REQUEST["id"];
?>
<html>
<head>
<title><? echo $title_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="STYLESHEET" type="text/css" href="board_style.js.css">
<script language="javascript" src="board_script.js"></script>
</head>
<?

$result=mysql_query("select * from $board where id=$id");
$row=mysql_fetch_array($result);
$name=htmlspecialchars($row[name]);
$email=htmlspecialchars($row[email]);
$subject=htmlspecialchars($row[subject]);
$comment=htmlspecialchars($row[comment]);
?>

<body  bgcolor=<? echo $bgcolor ?>>
<center>
<form action=edit_ok.php?board=<? echo $board ?>&id=<? echo $id?>&name=<? echo $name ?> method=post name=tozzic onSubmit="return content_check(this)" enctype="multipart/form-data">     
<!-- 바깥 입니다 -->
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
<!-- 내부 시작 -->
<br>
<table border=0  cellpadding=1 cellspacing=1>
	<tr>
		<td width=560 height=20 align=center bgcolor=<? echo $table_in ?>>
			<font color=<? echo $up_font ?>><B>글수정</B></font>
		</td>
	</tr>
	<tr>
		<td height=20  bgcolor=<? echo $bgcolor?>>&nbsp;
<!-- 글쓰는 폼의 시작 -->
<TABLE border=0 align=center>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<? echo $list_font ?>>이름</TD>
		<TD width=300 height=20 align=left><font size=2 color=<? echo $list_font ?>><b><? echo $name ?></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2  color=<? echo $list_font ?>>이메일</TD>
		<TD height=20 align=left><INPUT type=text name=email size=20 maxlength=25 class=box value="<? echo $email ?>"></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left bgcolor><font size=2  color=<? echo $list_font ?>>비밀번호</TD>
		<TD height=20 align=left bgcolor><INPUT type=password name=passwd size=8 maxlength=8 class=box><font color=<? echo $list_font ?>>(비밀번호가 일치해야 합니다.)</TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left bgcolor><font size=2  color=<? echo $list_font ?>>제 목</TD>
		<TD height=20 align=left bgcolor><INPUT type=text name=subject size=50 maxlength=45 class=box value="<? echo $subject ?>">
		&nbsp;&nbsp;html<input type=checkbox name=html></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2  color=<? echo $list_font ?>>내용</TD>
		<TD height=20 align=left>
<TEXTAREA name=comment cols=65 rows=15 class=box>
<? echo $comment ?>
</TEXTAREA></TD>
	</TR>
	<tr>
		<td><font size=2  color=<? echo $list_font ?>>첨부파일</td><td><input type=file name=upfile size=50 maxlength=255 class=box readonly>
			<br><font color=<? echo $list_font ?>>
<?
if ($row[upfile_name])	{
$tmp_file_name = substr ("$row[upfile_name]",6);
echo $tmp_file_name."가 등록되어 있습니다. <input type=checkbox name=del_file>삭제";
}
?><br>파일업로드는 그림파일만 가능합니다.
		</td>
	</tr>
	<TR>
		<TD align=center colspan=2><br>
			<input type=submit value=save class=submit>
			<input type=reset value=cancel class=submit>
			<input type=button value=back class=submit onclick='javascript:history.go(-1)'>
		</TD>
	</TR>
</TABLE>
<!-- 글쓰는 폼의 종료 -->
		</td>       
	</tr>
</table><br>
<!-- 내부 종료 -->
        </td>
    </tr>
    <tr>
        <td bgcolor="<? echo $table_out ?>" height="21">
        </td>
        <td bgcolor="<? echo $table_out ?>" height="21">
			<a href="list.php?board=<? echo $board ?>">list</a></font></p>
        </td>
    </tr>
</table>
<!-- 바깥 종료 -->

</center>
<P>
<script>
$("#email").focus();
</script>
</body>
<?
mysql_close();
?>
</html>
