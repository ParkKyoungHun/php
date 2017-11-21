<?
include "../inc/config.inc.php";
include "config.inc.php";
$day = date("m/d");
$board = $_REQUEST["board"];
$id = $_REQUEST["id"];
?>
<html>
<head>
<title>게시물보기</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
td  { font-size : 9pt; text-decoration : none; }
A:link  { font : 9pt;  text-decoration : none; font-size : 9pt;  }
A:visited  {   text-decoration : none;  font-size : 9pt;  }
A:hover  {  text-decoration : underline;  font-size : 9pt;  }
.box {
	Background-color:white; 
	Border:1x SOLID gray
}
</style>
<SCRIPT>
function checkComment(){
	var ci_name = $("#ci_name").val().trim().length;
	var ci_passwd = $("#ci_passwd").val().trim().length;
	var ci_comment = $("#ci_comment").val().trim().length;
	
	if ( ci_name == 0 ) {
		alert("커멘트 이름을 입력 하세요.");
		$("#ci_name").val("");
		$("#ci_name").focus();
		return false;
	}
	if ( ci_passwd == 0 ) {
		alert("커멘트 비밀번호를 입력 하세요.");
		$("#ci_passwd").val("");
		$("#ci_passwd").focus();
		return false;
	}
	if ( ci_comment == 0 ) {
		alert("커멘트 내용을 입력 하세요.");
		$("#ci_comment").val("");
		$("#ci_comment").focus();
		return false;
	}
	return true;
}
function Check()
{
	var passwd = $("#passwd").val().trim().length;
	if ( passwd == 0 ) {
		alert("암호를 입력 하세요.");
		$("#passwd").val("");
		$("#passwd").focus();
		return false;
	}
	return true;
}
</SCRIPT>
</head>

<body>
<center>
<?

// 조회수($see) 업데이트 
$result0=mysql_query("select see from $board where id=$id");
$row0=mysql_fetch_array($result0);
$see=$row0[see]+1;
$sql=mysql_query("update $board set see=$see where id=$id");

$result=mysql_query("select * from $board where id=$id");
$row=mysql_fetch_array($result);

if ($row[html] == 'no' || $row[html] == '')	{
	$comment=str_replace("<","&lt;",$row[comment]);
	$comment=str_replace("<","&gt;",$comment);
	$comment=str_replace("\n","<br>",$comment);
} else if ($row[html] == 'yes') {
	$comment = eregi_replace ("<meta", "(않좋은 태그-->meta)", $row[comment]);
	$comment = eregi_replace ("<script", "(않좋은 태그-->script)", $comment);
	$comment = eregi_replace ("javascript", "(않좋은 태그-->java)", $comment);
	$comment = eregi_replace ("alert", "(않좋은 태그-->alert)", $comment);
	$comment = eregi_replace ("<pre", "(않좋은 태그-->pre)", $comment);
	$comment = eregi_replace ("<xmp", "(않좋은 태그-->xmp)", $comment);
	$comment = eregi_replace ("<input", "(않좋은 태그-->input)", $comment);
	$comment=str_replace("\n","<br>",$comment);
}

$name=htmlspecialchars($row[name]);

$subject=htmlspecialchars($row[subject]);
$subject = str_replace("&nbsp;"," ",$subject);

$wdate = substr ("$row[wdate]",0,10);
?>
<table border="0" width="88%" style="border-width:1px; border-color:<?=$table_out ?>; border-style:solid;" cellpadding="0" cellspacing="0" width="964">
    <tr>
        <td width="846"  height="19">
            <p></p>
        </td>
        <td width="118"  height="19">
            <p align=right><font face="돋움체" size="2" >today : <?=$day ?></font>&nbsp;</p>
        </td>
    </tr>
    <tr>
        <td height="199" colspan="2" align=center>
			<table width=87% border=0 cellpadding=1 cellspacing=0>
				<tr>
				<td width=563 height=20 align=center >
					<font color=<?=$up_font?> size=2 face=돋움><b>제목 : <?=$subject ?></b></font>
					</td>
				<td  align=right>
					<font color=<?=$up_font?>>조회수:<?= $row[see] ?>&nbsp;</font>
					</td>
				</tr>
				<tr>
					<td width=717 height=20 colspan=2>
						<p><br>&nbsp;<font color=#272727>글쓴이 : 
<?
if ($row[email])	{
	echo "<a href=mailto:$row[email]><b>$name</b></a>&nbsp;";
} else {
	echo "<b>$name</b>";
}
?>
						</p>
						<?=$comment?></p>
						<p align=right>
						생성일자 : <?=$wdate ?><br>
						아이피 : <?=$row[ip] ?>
						</p>
						<p>
<?
if ($row[upfile_name])	{
	$tmp_file_name = substr ("$row[upfile_name]",6);
	echo ("<br>첨부파일 : <a href=../data/$row[upfile_name]>$tmp_file_name</a>");
}

if ( $row[upfile_type] ==	'image/gif'  or $row[upfile_type] == 'image/pjpeg' or $row[upfile_type] == 'image/bmp' or $row[upfile_type] == 'image/x-png')	{
	echo "<br><img src=../data/$row[upfile_name]> ";	
}
?>
						</p>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<!-- 댓글 리스트 시작-->
						<table border=1 width=100%>
<?
$result=mysql_query("select id,name,comment,wdate from $board where familly=$id");
while($row_comment=mysql_fetch_array($result)){
	$name=htmlspecialchars($row_comment[name]);
	$comment=htmlspecialchars($row_comment[comment]);
	$wdate = substr ("$row_comment[wdate]",0,10);
?>
							<tr onMouseOver=this.style.backgroundColor='gainsboro' onMouseOut=this.style.backgroundColor=''>
								<td width=15%><font size=2 face=돋움>[ <?=$name ?> ]</td>
								<td width=73%><font size=2 face=돋움><?=$comment ?></td>
								<td width=10% align=center><font size=2 face=돋움 color=dimgray><?=$wdate ?></td>
								<td width=2% align=center><font size=2 face=돋움 color=dimgray><a href=del_comment_pre.php?board=<?=$board ?>&id=<?=$row_comment[id] ?>&main_id=<?=$row[id] ?>>x</a></td>
							</tr>
<?
}
?>
							<tr>
								<td colspan=4 height=8></td>
							</tr>
							<tr>
								<td align=right>
									<!-- 꼬리글 넣는 폼 시작 -->
									<form action=comment_insert.php?board=<?=$board ?>&id=<?=$id ?> method=post name=comment onsubmit="return checkComment()">
										<font size=2 color=dimgray face=돋움>Name : <input type=text name=name id="ci_name" size=7 maxlength=10 class=box><br>
										<br>Pass : <input type=password name=passwd id="ci_passwd" size=7 maxlength=10 class=box>
										</td>
										<td><textarea class=box cols=69 rows=4 name=comment id="ci_comment" ></textarea></td>
										<td colspan=2 align=center>
										<input type=submit value=comment style="background-color:white; padding-top:21; padding-right:0; padding-bottom:21; padding-left:0; border-width:1; border-color:rgb(201,201,201); border-style:solid;">
									</form>
									<!-- 꼬리글 넣는 폼 끝 -->
								</td>
							</tr>
						</table>
						<!-- 댓글 리스트 끝-->
					</td>
				</tr>
				<tr>
					<td align=left >
						<a href=list.php?board=<?=$board ?>>&nbsp;list</a> |
						<a href=write.php?board=<?=$board ?>>write</a> |
						<a href=reply.php?board=<?=$board ?>&id=<?=$id?>&mother=<?=$row[mother]?>&step=<?=$row[step]?>&sequence=<?=$row[sequence]?>>reply</a> |
						<a href=edit.php?board=<?=$board ?>&id=<?=$id?>>edit</a> |
					</td>
					<td align=right >
						<form action=del.php?board=<?=$board ?>&id=<?=$id?> method=post name=del onSubmit='return Check()'>
							비번 : <input type=password name=passwd id="passwd" size=8 class=box>
							<input type="submit" value="삭제">
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</center>
</body>
</html>
