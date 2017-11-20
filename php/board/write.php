<?
include "../inc/config.inc.php";
include "config.inc.php";
$board = $_REQUEST["board"];
$day = date("m/d");
?>
<html>
<head>
<title>게시글 작성</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="STYLESHEET" type="text/css" href="board_style.css">
<script language="javascript" src="board_script.js"></script>
</head>

<body>
<center>
<form action=insert.php?board=<?=$board ?> method=post onSubmit="return Write_Check()" enctype="multipart/form-data">     

<table border="0" width="85%" style="border-width:1px; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846" height="19">
            <p>&nbsp;&nbsp;
            </font></p>
        </td>
        <td width="118" height="19">
            <p>today : <?=$day ?></font></p>
        </td>
    </tr>
    <tr>
        <td height="199" colspan="2" align=center>
			<table border=0  cellpadding=1 cellspacing=1>
				<tr>
					<td width=560 height=20 align=center >
						<B>글쓰기</B></font>
					</td>
				</tr>
				<tr>
					<td height=20>&nbsp;
						<TABLE border=0 align=center>
							<TR>
								<TD width=60 height=20 align=left>이름</TD>
								<TD width=250 height=20 align=left><input type=text name=name id="name" size=10 maxlength=7 class=box> 최대7글자.</TD>
							</TR>
							<TR>
								<TD height=20 align=left>이메일</TD>
								<TD height=20 align=left><INPUT type=text name=email size=25 id="email" maxlength=35 class=box></TD>
							</TR>
							<TR>
								<TD height=20 align=left bgcolor>비밀번호</TD>
								<TD height=20 align=left bgcolor><INPUT type=password name=passwd id="passwd" size=8 maxlength=8 class=box> (수정 삭제시 반드시 필요)</TD>
							</TR>
							<TR>
								<TD height=20 align=left bgcolor>제목</TD>
								<TD height=20 align=left bgcolor><INPUT type=text name=subject id="subject" size=52 maxlength=50 class=box>&nbsp;&nbsp;&nbsp;html<input type=checkbox name=html></TD>
							</TR>
							<TR>
								<TD height=20 align=left>내용</TD>
								<TD height=20 align=left><TEXTAREA name=comment id="comment" cols=65 rows=15 class=box></TEXTAREA></TD>
							</TR>
							<tr>
								<td>파일</td><td><input type=file name=upfile size=50 maxlength=255 class=box>
								<br>그림파일만 업로드 할 수 있습니다.</td>
							</tr>
							<TR>
								<TD align=center colspan=2><br>
									<input type=submit value=save class=submit>
									<input type=reset value=cancel class=submit>
									<input type=button value=back class=submit onclick='javascript:history.go(-1)'>
								</TD>
							</TR>
						</TABLE>
					</td>
				</tr>
			</table>
        </td>
    </tr>
</table>
</center>
<P>

</form>
</body>
</html>
