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
<?

$result=mysql_query("select * from $board where id=$id");
$row=mysql_fetch_array($result);
$name=htmlspecialchars($row[name]);
$email=htmlspecialchars($row[email]);
$subject=htmlspecialchars($row[subject]);
$comment=htmlspecialchars($row[comment]);
?>

<body  bgcolor=<?=$bgcolor ?>>
<center>
<form action=edit_ok.php?board=<?=$board ?>&id=<?=$id?>&name=<?=$name ?> method=post name=tozzic onSubmit="return content_check(this)" enctype="multipart/form-data">     
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
<br>
<table border=0  cellpadding=1 cellspacing=1>
	<tr>
		<td width=560 height=20 align=center bgcolor=<?=$table_in ?>>
			<font color=<?=$up_font ?>><B>�ۼ���</B></font>
		</td>
	</tr>
	<tr>
		<td height=20  bgcolor=<?=$bgcolor?>>&nbsp;
<!-- �۾��� ���� ���� -->
<TABLE border=0 align=center>
	<TR>
		<TD width=60 height=20 align=left><font size=2 color=<?=$list_font ?>>�̸�</TD>
		<TD width=300 height=20 align=left><font size=2 color=<?=$list_font ?>><b><?=$name ?></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2  color=<?=$list_font ?>>�̸���</TD>
		<TD height=20 align=left><INPUT type=text name=email size=20 maxlength=25 class=box value="<?=$email ?>"></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left bgcolor><font size=2  color=<?=$list_font ?>>��й�ȣ</TD>
		<TD height=20 align=left bgcolor><INPUT type=password name=passwd size=8 maxlength=8 class=box><font color=<?=$list_font ?>>(��й�ȣ�� ��ġ�ؾ� �մϴ�.)</TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left bgcolor><font size=2  color=<?=$list_font ?>>�� ��</TD>
		<TD height=20 align=left bgcolor><INPUT type=text name=subject size=50 maxlength=45 class=box value="<?=$subject ?>">
		&nbsp;&nbsp;html<input type=checkbox name=html></TD>
	</TR>
	<TR>
		<TD width=60 height=20 align=left><font size=2  color=<?=$list_font ?>>����</TD>
		<TD height=20 align=left>
<TEXTAREA name=comment cols=65 rows=15 class=box>
<?=$comment ?>
</TEXTAREA></TD>
	</TR>
	<tr>
		<td><font size=2  color=<?=$list_font ?>>÷������</td><td><input type=file name=upfile size=50 maxlength=255 class=box readonly>
			<br><font color=<?=$list_font ?>>
<?
if ($row[upfile_name])	{
$tmp_file_name = substr ("$row[upfile_name]",6);
echo $tmp_file_name."�� ��ϵǾ� �ֽ��ϴ�. <input type=checkbox name=del_file>����";
}
?><br>���Ͼ��ε�� �׸����ϸ� �����մϴ�.
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
<!-- �۾��� ���� ���� -->
		</td>       
	</tr>
</table><br>
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
document.tozzic.email.focus();
</script>
</body>
<?
mysql_close();
?>
</html>
