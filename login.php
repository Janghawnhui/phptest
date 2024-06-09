<?php
    $id   = $_POST["id"];
    $pass = $_POST["passwd"];

   $con = mysqli_connect("localhost", "user1", "12345", "music_festival"); //mysqli_connect()함수를 이용하여 mysql 서버 점속
   $sql = "select * from member where id='$id'"; //members에 입력한 id가 있는지 확인
   $result = mysqli_query($con, $sql); //mysqli_query 함수를 이용하여 사용자가 입력한 아이디 검색하고 결과 result에 저장

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result); //mysqli_fetch_array()함수로 해당 레코드를 가져와 $row에 저장
        //
        $db_pass = $row["passwd"];
      //DB에 저장된 비밀번호를 $db_pass에 저장
        mysqli_close($con);

        if($pass != $db_pass) //입력한 비밀번호와 db에서 가져온 비밀번호가 일치한지 비교
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
          //db에서 가져온 비밀번호와 같다면 session_start()함수로 세션 시작
          //db에 저장된 아이디 이름 레벨 포인트 값으로 세션 생성
            session_start();
            $_SESSION["userid"] = $row["id"]; //로그인된 사용자의 아이디의 정보 저장
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];

            echo("
              <script>
                location.href = 'index.php';
              </script>
            ");
        }
     }        
?>
