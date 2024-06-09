<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="main_img_bar">
        <img src="./img/main.jpg" height="200">
    </div>
    <div id="board_box">
        <h3 class="title">
            게시판 > 내용보기
        </h3>
<?php
    $num  = $_GET["num"];
    $page  = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");
    $sql = "select * from festival_board where num=$num";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    $id      = $row["id"];
	$userid = $_SESSION["userid"];
    $name      = $row["name"];
    $regist_day = $row["regist_day"];
    $subject    = $row["subject"];
    $content    = $row["content"];
    $file_name    = $row["file_name"];
    $file_type    = $row["file_type"];
    $file_copied  = $row["file_copied"];
    $hit          = $row["hit"];
    $reserve_date = $row["reserve_date"];

    $content = str_replace(" ", "&nbsp;", $content);
    $content = str_replace("\n", "<br>", $content);

    $new_hit = $hit + 1;
    $sql = "update festival_board set hit=$new_hit where num=$num";   
    mysqli_query($con, $sql);

    // 사용자 예약 여부 확인
    $userid = $_SESSION["userid"];
    $sql_reserve_check = "SELECT * FROM reservations WHERE user_id='$userid' AND board_num=$num";
    $result_reserve_check = mysqli_query($con, $sql_reserve_check);
    $is_reserved = mysqli_num_rows($result_reserve_check) > 0;

    $sql_like_check = "SELECT * FROM likes WHERE user_id='$userid' AND post_id='$num'";
    $result_like_check = mysqli_query($con, $sql_like_check);
    $is_liked = mysqli_num_rows($result_like_check) > 0;
?>      
        <ul id="view_content">
            <li>
                <span class="col1"><b>제목 :</b> <?=$subject?></span>
                <span class="col2"><?=$name?> | <?=$regist_day?></span>
            </li>
            <li>
                <?=$content?>
            </li>       
            <li>
                <span class="col1"><b>예약 날짜 :</b> <?=$reserve_date?></span>
            </li>
        </ul>
        <ul class="buttons">
            <li><button onclick="location.href='board_festival_list.php?page=<?=$page?>'">목록</button></li>
			<?php 
				if($id==$userid) {
					?>
            <li><button onclick="location.href='board_festival_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
            <li><button onclick="location.href='board_festival_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
			<?php
				}
				?>
            <li>
                <form action="board_festival_reserve.php" method="post" style="display:inline;">
                    <input type="hidden" name="num" value="<?=$num?>">
                    <input type="hidden" name="page" value="<?=$page?>">
                    <input type="hidden" name="action" value="<?=$is_reserved ? 'cancel' : 'reserve'?>">
                    <button type="submit"><?=$is_reserved ? '예약 취소' : '예약하기'?></button>
                </form>
            </li>
            <li>
                <form action="like_toggle.php" method="post" style="display:inline;">
                    <input type="hidden" name="num" value="<?=$num?>">
                    <button type="submit"><?=$is_liked ? '찜 취소' : '찜하기'?></button>
                </form>
            </li>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
