
function board_script()
{
  var passwd = $("#passwd").val().trim().length;
  var comment = $("#comment").val().trim().length;
  var subject = $("#subject").val().trim().length;
  var name = $("#name").val().trim().length;
  if( name == 0){
    alert("이름을 입력 하세요.");
    $("#name").focus();
    $("#name").val("");
    return false;
  }
  if ( passwd == 0 ) {
    alert("암호를 입력 하세요.");
    $("#passwd").val("");
    $("#passwd").focus();
    return false;
  }
  if ( subject == 0 ) {
    alert("제목을 입력하세요.");
    $("#subject").val("");
    $("#subject").focus();
    return false;
  }
  if ( subject > 50 ) {
    alert("제목이 너무 깁니다.");
    $("#subject").focus();
    return false;
  }
  if ( comment == 0 ) {
    alert("내용을 입력하세요.");
    $("#comment").focus();
    return false;
  }
  if ( comment > 8000 ) {
    alert("글의 내용이 너무 깁니다.");
    $("#comment").focus();
    return false;
  }
  return true;
}
