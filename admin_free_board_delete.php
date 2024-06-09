<?php
    session_start(); // 세션 시작
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if ( $userlevel != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1) // 이전 페이지로 이동
            </script>
        ");
        exit;
    }

    // POST로 가져온item 이 있으면
    if (isset($_POST["item"]))
        $num_item = count($_POST["item"]); // 선택된 게시글 수
    else
    {
        echo("
            <script>
            alert('삭제할 게시글을 선택해주세요!');
            history.go(-1) // 이전 페이지로 이동
            </script>
        ");
        exit; 
    }

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");

    // 선택된 각 게시글에 대해 삭제 처리
    for($i=0; $i<$num_item; $i++){
        $num = $_POST["item"][$i]; // 선택된 게시글 번호

        // 선택된 게시글의 정보를 가져오는 쿼리 실행
        $sql = "select * from free_board where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $copied_name = $row["file_copied"]; // 첨부파일 이름 가져오기

        // 첨부파일이 존재하는 경우 파일 삭제
        if ($copied_name)
        {
            $file_path = "./img/".$copied_name;
            unlink($file_path); // 파일 삭제
        }

        // 게시글 삭제 쿼리 실행
        $sql = "delete from free_board where num = $num";
        mysqli_query($con, $sql);
    }       

    // 데이터베이스 연결 종료
    mysqli_close($con);

    // 삭제 후 관리자 페이지로 이동
    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>
