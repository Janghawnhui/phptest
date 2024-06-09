<?php
  session_start();
  //uset ()함수를 이용하여 세션 변수 삭제
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  //userid, username...값이 " " 즉 null값이 되므로 로그인 되지 않은 상태의 메뉴가 나타남
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
