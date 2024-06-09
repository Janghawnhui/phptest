<?php

    $num   = $_GET["num"];//get방식 번호 페이지 불러오기
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
  //$copied_nmae에 값이 설정되어있으면 첨부파일이 존재하므로 if문 실행

	{
		$file_path = "./img/".$copied_name;
		unlink($file_path);//unlink()함수로 서버에 저장된 첨부 파일 삭제
    }

    $sql = "delete from board where num = $num";
    //db에서 해당 레코드 삭제
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>

