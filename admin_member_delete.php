<?php
    session_start(); // 세션 시작
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    // 관리자가 아닌 경우 접근 제한
    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1) // 이전 페이지로 이동
            </script>
        ");
        exit; //종료
    }

    // GET으로 num가져옴
    $num = $_GET["num"];

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");

    // member 테이블에서 num에 해당하는 회원을 삭제하는 쿼리 실행
    $sql = "delete from member where num = $num";
    mysqli_query($con, $sql);

    // 데이터베이스 연결 종료
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>
