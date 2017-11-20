<?
include "../inc/config.inc.php";  //  �����ͺ��̽� ���� ���� ���� ����
include "config.inc.php";
$day = date("m/d");
?>
<html>
<head>
<title><?=$title_name ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="STYLESHEET" type="text/css" href="toziboard.css">
<script language="javascript" src="write_check.js"></script>
</head>

<body  bgcolor=<?=$bgcolor ?>>
<center>
<!-- �ٱ� �Դϴ� -->
<table border="0" width="85%" style="border-width:1px; border-color:<?=$table_out ?>; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846"  height="19">
            <p><font size="2" face="����" >&nbsp;&nbsp;
            </font></p>
        </td>
        <td width="118"  height="19">
            <p><font face="����ü" size="2" >today : <?=$day ?></font></p>
        </td>
    </tr>
    <tr>
        <td height="199" colspan="2" align=center>
<!-- ���� ���� -->
<form action=re_insert.php?board=<?=$board ?>&id=<?=$id ?>&mother=<?=$mother?>&step=<?=$step?>&sequence=<?=$sequence?> method=post name=tozzic onSubmit="return Write_Check()" enctype="multipart/form-data">
<br>
<table border=0  cellpadding=1 cellspacing=1>
	<tr>
		<td width=565 height=20 align=center bgcolor=<?=$table_in ?>>
			<font color=<?=$up_font ?>><B>��۾���</B></font>
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
<!-- �۾��� ���� ���� -->
<TABLE border=0 align=center>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<?=$list_font ?>>�̸�</TD>
		<TD width=300 height=20 align=left><font size=2 color=<?=$list_font ?>><input type=text name=name size=20 maxlength=25 class=box></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<?=$list_font ?>>�̸���</TD>
		<TD height=20 align=left><INPUT type=text name=email size=20 maxlength=25 class=box></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<?=$list_font ?>>��й�ȣ</TD>
		<TD height=20 align=left><INPUT type=password name=passwd size=8 maxlength=8 class=box>(����,������ �ݵ�� �ʿ�)</TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<?=$list_font ?>>�� ��</td>
		<TD height=20 align=left><INPUT type=text name=subject size=50 maxlength=50 value="
<?
$subject = str_replace(chr(34),"&#34",$subject);

echo "Re:".$subject;
?>"  class=box>&nbsp;&nbsp;&nbsp;&nbsp;html<input type=checkbox name=html>
		</TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<?=$list_font ?>>����</TD>
		<TD height=20 align=left>
<TEXTAREA name=comment cols=65 rows=15  class=box>
:::: <?=$name ?>�� �� ::::
<?=$comment ?>
</TEXTAREA>
		</TD>
	</TR>
	<tr>
		<td><font size=2 color=<?=$list_font ?>>÷������</td>
		<td><input type=file name=upfile size=50 maxlength=255 class=box readonly><br><font color=<?=$list_font ?>>�׸����ϸ� ���ε� �� �� �ֽ��ϴ�.</td>
	</tr>
	<TR>
		<TD align=center colspan=2>
			<input type=submit value=save class=submit>
			<input type=reset value=cancel class=submit>
			<input type=button value=back class=submit onclick='javascript:history.go(-1)'>
		</TD>
	</TR>
</TABLE>
<!-- �۾��� ���� �� -->
</td>       
</tr>
</table></form>
<!-- ���� ���� -->
        </td>
    </tr>
    <tr>
        <td  height="21">
            <p align="left">
            <font size="1" face="����" >&nbsp;
            <a href="http://tozigy.com" target="_blank" style="font-size:8pt">copyright �� tozigy.com. All rights reserved.</a></font>
            </p>
        </td>
        <td  height="21">
            <p align="left"><a href="write.php?board=<?=$board ?>"><font size="2" face="����ü" >write</a> 
            | <a href="list.php?board=<?=$board ?>"><font size="2" face="����ü" >list</a></font></p>
        </td>
    </tr>
</table>
<!-- �ٱ� ���� -->
</center>
<P>
<script>
document.tozzic.name.focus();
</script>
</body>
</html>
