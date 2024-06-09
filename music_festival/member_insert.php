<?php
    $id   = $_POST["id"]; //회원가입 페이지에서 입력한 데이터
    $passwd = $_POST["passwd"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $phonenum= $_POST["phonenum"];
    $address = $_POST ["address"];
    $hobby = $_POST ["hobby"];
    $introduce = $_POST ["introduce"];
              
    $con = mysqli_connect("localhost", "user1", "12345", "music_festival"); 
    //mysqli_connect() 함수를 이용하여 mysql 계정에 sample데이터베이스에 연결 성공:식별자 번호 실패:false
	$sql = "insert into member(id, passwd, name, age, gender, phonenum, address ,hobby, introduce, level, point) ";
    //members 테이블에 id~point컬럼까지 데이터를 저장하는 명령을 $sql에 저장
	$sql .= "values('$id', '$passwd', '$name', '$age','$gender', '$phonenum','$address', '$hobby', '$introduce, 9, 0)";
    //.= 연산을 통해서 sql에 데이터를 저장하는 명령 뒤에 입력할 값을 post받아서 넣어줌
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    //mysqli_query(연결할mysql, 명령어)
    mysqli_close($con); //다했으면 mysql서버와 연결 끊기   

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>