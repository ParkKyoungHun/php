
                              ToziBoard PHP ver 1.7.7 ReadMe

1. 저작권

 <? ToziBoard PHP ver 1.7.5(이하 ToziBoard)는 자유 공개 소스로, 자유로운 소스 공개와 수정을 허락한다.
 <? 단 PHP보드 내의 저작권에 관한 부분, Copyright ⓒ tozigy.com 부분은 수정할 수 없다.
 <? ToziBoard는 교육적인 목적으로 사용할 수 있다.
 <? 윈도우 브라우저 상단에 보이는 메시지는 수정할 수 있다.

2. 사용환경

 <? PHP, MYSQL

3. 설치법

 <? 적당한 곳에 압축을 푼다.
 <? inc/config.inc.php를 자신의 서버에 맞게 수정한다. (skin/bbs/config.inc.php는 게시판의 색상에 대한 환경설정 파일입니다.)
 <? data 폴더의 퍼미션을 777로 바꾼다.
 <? create_table.php를 이용하여 테이블을 형성한다.
     ex) create_table.php?board=원하는테이블명 (<-- 나중에는 보안을 위해서 지우시기 바랍니다.)
 <? ./skin/gray_bbs/list.php?board=테이블명 <- 을 웹브라우저에서 불러 본다.
 <? skin 폴더의 하위 디렉토리명을 변경하여, 스킨을 바꿀 수 있다.
 <? 게시판의 색상에 대한 설정은 bbs/config.inc 에서 바꿀 수 있습니다. (색상, 글씨 등)

4. 히스토리

ver 0.9
 <? 단순 게시판기능, 답글기능

ver 1.0
 <? 방명록 추가, 게시판 업데이트
 
ver 1.2
 <? 일기장 추가, 방명록 아이콘 기능 추가
 
ver 1.5
 <? 게시판 답글 기능 수정, 일기장 버그 수정
 
ver 1.6
 <? inc파일 inc.php로 바꿈, 꼬리글 기능 추가, create_table.php 수정
 
ver 1.7
 <? html 태그 선택, 지원 문제 해결, 저작권 표기 부분 수정
 
ver 1.7.5
 <? html 지원 문제 해결, 타이틀 버그 수정
 
ver 1.7.7
 <? 자바스크립트, CSS 수정, 꼬리글 버그 수정, 일기장+방명록 버그 수정
 <? bbs2 추가

5. 버그 리포트

 <? http://tozigy.com
 <? tozigy@empal.com
