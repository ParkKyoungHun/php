<html>

<head>
<title>커멘스 삭제</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
td  { font-size : 9pt;   }
A:link  { font : 9pt;   color : dimgray ;  text-decoration : none; font-family : 굴림; font-size : 9pt;  }
A:visited  {   text-decoration : none; color : dimgray ; font-size : 9pt;  }
A:hover  {  text-decoration : underline; color : dimgray ; font-size : 9pt;  }
.box {
    Background-color: white; 
    Border:1x SOLID gray
}
</style>
<SCRIPT LANGUAGE=JAVASCRIPT>
function WriteCheck(){
    var passwd = $("#passwd").val().trim().length;
    if ( passwd == 0 ) {
        alert("암호를 입력 하세요.");
        $("#passwd").val("");
        $("#passwd").focus();
        return;
    }
    tozzic.submit();
}
</script>
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table align="center" border="0" width="304" style="border-width:1px; border-color:rgb(black); border-style:solid;" cellpadding="0" cellspacing="0">
    <tr>
        <td width="298" bgcolor="gray" height="22">
            <p><font color="white" size="2" face="돋움">&nbsp;</font><font size="2" face="돋움" color="white">
            글을 삭제 합니다.</font></p>
        </td>
    </tr>
    <tr>
        <td width="298" height="36">
            <form action=del_comment.php?board=<? echo $board ?>&id=<? echo $id ?>&main_id=<? echo $main_id ?> method=post name=tozzic>
                <p align="center"><font size="2" face="돋움" color="dimgray">Password 
                :  <input type="password" name=passwd maxlength="15" size="10" class="box"> 
                &nbsp;<input type="submit" value="확인">&nbsp;<a href="javascript:history.go(-1);">[취소]</a></font></p>
            </form>
        </td>
    </tr>
    <tr>
        <td width="298" bgcolor="gray" height="21">
            <p align="right"><font size="2" face="돋움" color="white">&nbsp;
            Copyright ⓒ <a href=http://tozigy.com target=_blank>Tozigy.com</a>. All right for Tozigy.</font></p>
        </td>
    </tr></form>
</table>
<p>&nbsp;</p>
</body>
<script>
	$("#passwd").focus();
</script>
</html>
