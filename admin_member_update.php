<?php
    session_start(); // 세션 시작
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    //$userlevel에 members에서 가져온 userlevel 넣음
    else $userlevel = "";

    // 관리자가 아닐시 접근 X
    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1) // 이전 페이지로 이동
            </script>
        ");
        exit; // 스크립트 종료
    }

    // GET 으로 num 과 POST로 level, point를 가져옴
    $num   = $_GET["num"];
    
    $age = $_POST["age"];   
    $phonenum= $_POST["phonenum"];
    $address=$_POST["address"];
    $level = $_POST["level"];
    $point = $_POST["point"];
    $musician = $_POST["musician"];

    if($musician == 'musician') {
        $level = 101;
    } else {
        $level = 10;
    }
    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");
    
    // members 테이블에서 num에 해당하는 회원의 level과 point를 업데이트
    $sql = "UPDATE member SET age='$age', phonenum='$phonenum', address='$address', level='$level', point='$point', musician='$musician' WHERE num='$num'";
    mysqli_query($con, $sql);

    // 데이터베이스 연결 종료
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>
