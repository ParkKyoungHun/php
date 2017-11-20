<html>

<head>
<title>ToziBoard PHP ver 1.7.1</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!-- 
    td  { font-size : 9pt;   }
    A:link  { font : 9pt;   color : dimgray ;  text-decoration : none; font-family : ����; font-size : 9pt;  }
    A:visited  {   text-decoration : none; color : dimgray ; font-size : 9pt;  }
    A:hover  {  text-decoration : underline; color : dimgray ; font-size : 9pt;  }

.box {
Background-color: white; 
Border:1x SOLID gray
}
//-->
</style>
<SCRIPT LANGUAGE=JAVASCRIPT>
function WriteCheck()
{
passwd = document.tozzic.passwd.value.length;
if ( passwd == 0 ) {
  alert("��ȣ�� �Է� �ϼ���.");
  document.tozzic.passwd.focus();
  return;
}
tozzic.submit();
}
</script>
</head>

<body bg text="black" link="blue" vlink="purple" alink="red">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table align="center" border="0" width="304" style="border-width:1px; border-color:rgb(black); border-style:solid;" cellpadding="0" cellspacing="0">
    <tr><form action=del_comment.php?board=<?=$board ?>&id=<?=$id ?>&main_id=<?=$main_id ?> method=post name=tozzic>
        <td width="298" bgcolor="gray" height="22">
            <p><font  size="2" face="����">&nbsp;</font><font size="2" face="����" >
            ���� ���� �մϴ�.</font></p>
        </td>
    </tr>
    <tr>
        <td width="298" height="36">
            <p align="center"><font size="2" face="����" color="dimgray">Password 
            :  <input type="password" name=passwd maxlength="15" size="10" class="box"> 
            &nbsp;<a href='javascript:WriteCheck();'>[Ȯ��]</a>&nbsp;<a href="javascript:history.go(-1);">[���]</a></font></p>
        </td>
    </tr>
    <tr>
        <td width="298" bgcolor="gray" height="21">
            <p align="right"><font size="2" face="����" >&nbsp;
            Copyright �� <a href=http://tozigy.com target=_blank>Tozigy.com</a>. All right for Tozigy.</font></p>
        </td>
    </tr></form>
</table>
<p>&nbsp;</p>
</body>
<script>
	document.tozzic.passwd.focus();
</script>
</html>
