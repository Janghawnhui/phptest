<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>찜한 게시판 목록</title>
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
        <h3>찜한 게시판 목록</h3>
        <ul id="board_list">
            <li>
                <span class="col1">번호</span>
                <span class="col2">제목</span>
                <span class="col3">글쓴이</span>
                <span class="col4">첨부</span>
                <span class="col5">등록일</span>
                <span class="col6">조회</span>
            </li>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    $userid = "";
}

if ($userid == "") {
    echo "<script>
            alert('로그인이 필요합니다.');
            location.href = 'login.php';
          </script>";
    exit;
}

$con = mysqli_connect("localhost", "user1", "12345", "music_festival");
$sql = "SELECT b.num, b.subject, b.name, b.regist_day, b.hit, b.file_name 
        FROM festival_board b 
        JOIN likes l ON b.num = l.post_id 
        WHERE l.user_id = '$userid' 
        ORDER BY b.num DESC";
$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result);

$number = $total_record;

while ($row = mysqli_fetch_array($result)) {
    $num = $row["num"];
    $subject = $row["subject"];
    $name = $row["name"];
    $regist_day = $row["regist_day"];
    $hit = $row["hit"];
    if ($row["file_name"])
        $file_image = "<img src='./img/file.gif'>";
    else
        $file_image = " ";
?>
            <li>
                <span class="col1"><?=$number?></span>
                <span class="col2"><a href="board_festival_view.php?num=<?=$num?>&page=1"><?=$subject?></a></span>
                <span class="col3"><?=$name?></span>
                <span class="col4"><?=$file_image?></span>
                <span class="col5"><?=$regist_day?></span>
                <span class="col6"><?=$hit?></span>
            </li>    
<?php
    $number--;
}
mysqli_close($con);
?>
        </ul>
        <ul class="buttons">
            <li><button onclick="location.href='board_festival_list.php'">목록</button></li>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
