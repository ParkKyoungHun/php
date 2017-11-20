<?
$board = $_REQUEST["board"];
if (empty($board)) {
?>
    <form action="" method="get">
        <label for="board">생성할 게시판명 : </label>
        <input type="text" name="board">
        <input type="submit" value="테이블 생성">
    </form>
<?
}else{
    include "./inc/config.inc.php";

    $result=mysql_query( "create table $board ".
    "( id int not null auto_increment primary key ,".
    "name varchar(30),".
    "email varchar(50),".
    "homepage varchar(100), ".
    "passwd varchar(10) ,".
    "subject varchar(70),".
    "comment text,".
    "html char(3), ".
    "upfile_name varchar(60), ".
    "upfile_type varchar(20), ".
    "upfile_size int(10),".
    "wdate datetime,".
    "ip varchar(16),".
    "see int(5), ".
    "mother int(6),".
    "familly int(6),".
    "familly_num int(4),".
    "step int(6),".
    "sequence int(6)) ");

    if(!$result){
        echo(mysql_errno().": ");
        echo(mysql_error());
    }else{
        echo("테이블 $board 가 정상적으로 생성되었습니다.<br>");
        echo("<a href='./board/list.php?board=$board'> $board 게시판 가기</a>");
    }
    mysql_close($db);
}
?>

