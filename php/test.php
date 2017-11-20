<?
header("Content-Type: text/html; charset=utf-8");

$test = $_REQUEST["test1"];
echo ("test:".$test);

$result = "0";

$num1 = $_REQUEST["num1"];
$num2 = $_REQUEST["num2"];
$op = $_REQUEST["op"]; 
if(empty($num1)){
    echo "1";
}else{
    $result = $num1 +$num2;
}
?>
<html>
<head>
<meta charset="utf-8">
<title><?="계산기"?></title>
</head>
nananananana
is
nananananan
<a href="http://naver.com">
<?=("test:".$test);?>
</a>
<form action="" method="get">
<label for="num1">num1:</label>
<input type="text" name="num1">
<label for="op">연산자:</label>
<select name="op">
    <option value="+">+</option>
    <option value="-">-</option>
</select>
<label for="num2">숫자2:</label>
<input type="text" name="num2">
=
<input type="text" name="result" value="<?=$result?>">
<input type="submit" value="계산">
</form>
</html>