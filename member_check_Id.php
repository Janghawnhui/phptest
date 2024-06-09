<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #edbf07;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
   $id = $_GET["id"];

   if(!$id) 
   {
      echo("<li>아이디를 입력해 주세요!</li>");
   }
   else
   {
      $con = mysqli_connect("localhost", "user1", "12345", "music_festival");

 
      $sql = "select * from member where id='$id'";
      $result = mysqli_query($con, $sql);
      //mysql명령을 통해 멤버에서 입력한 아이디가 있는지 확인하는 명령어를 result에 저장
      $num_record = mysqli_num_rows($result);
      //num_record에 해당 명령어를 실행해줌
      if ($num_record) //$num_record가 값을 가지면 DB에 동일한 아이디가 존재한다는 것을 의미
      {
         echo "<li>".$id." 아이디는 중복됩니다.</li>";
         echo "<li>다른 아이디를 사용해 주세요!</li>";
      }
      else
      {
         echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()">
</div>
</body>
</html>

