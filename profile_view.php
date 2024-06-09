<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>프로필 보기</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>
<?php    
    if (!isset($_SESSION["userid"])) {
        echo("
            <script>
            alert('로그인 후 이용해주세요!');
            history.go(-1);
            </script>
        ");
        exit;
    }
    $userid = $_SESSION["userid"];
    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");
    $sql    = "select * from member where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $passwd = $row["passwd"];
    $name = $row["name"];
    $age = $row["age"];
    $gender = $row["gender"];
    $phonenum = $row["phonenum"];
    $address = $row["address"];
    $hobby = isset($row["hobby"]) ? explode(',', $row["hobby"]) : [];
    $introduce = $row["introduce"];
    $musician = $row["musician"];
    $upfile = $row["filename"];

    
?>
<section>
    <div id="main_img_bar">
        <img src="./img/main.jpg" height="200">
    </div>
    <div id="main_content">
        <div id="join_box">
            <h2>프로필 정보</h2>
            <div class="form id">
                <div class="col1">아이디</div>
                <div class="col2"><?=$userid?></div>                 
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">이름</div>
                <div class="col2"><?=$name?></div>                 
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">나이</div>
                <div class="col2"><?=$age?></div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">전화번호</div>
                <div class="col2"><?=$phonenum?></div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">주소</div>
                <div class="col2"><?=$address?></div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">성별</div>
                <div class="col2"><?=$gender == 'male' ? '남' : '여'?></div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">취미</div>
                <div class="col2">
                    <?php
                        if (in_array('Jazz', $hobby)) echo "재즈 ";
                        if (in_array('classic', $hobby)) echo "클래식 ";
                        if (in_array('pop', $hobby)) echo "POP ";
                        if (in_array('edm', $hobby)) echo "EDM ";
                        if (in_array('idol', $hobby)) echo "아이돌 ";
                    ?>
                </div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">자기소개</div>
                <div class="col2"><?=$introduce?></div>
            </div>
            <div class="clear"></div>

           
            <div class="clear"></div>

            <div class="form">
                <div class="col1">뮤지선 여부</div>
                <div class="col2"><?=$musician == 'musician' ? '뮤지션' : '일반인'?></div>
            </div>
            <div class="clear"></div>
                    <div class="form">
                <div class="col1">대표 이미지</div>		
                <div class="col2">
                    <?php if ($upfile): ?>
                        <img src="./img/<?=$upfile?>" alt="Profile Image" height="100">
                    <?php else: ?>
                        <span>이미지가 없습니다.</span>
                    <?php endif; ?>
                </div>
            </div><br><br><br><br><br>
            <div class="bottom_line"></div>
            <div class="buttons">
                <button type="button" onclick="location.href='member_modify_form.php'">수정하기</button>
                <button type="button" onclick="location.href='index.php'">홈으로</button>
            </div>
        </div> <!-- join_box -->
    </div> <!-- main_content -->
    <!-- 찜한 게시글 목록 표시 -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
            $sql = "SELECT b.num, b.subject, b.name, b.regist_day, b.hit, b.file_name
            FROM festival_board b
            WHERE b.num IN (
                SELECT l.post_id
                FROM likes l
                WHERE l.user_id = '$userid'
            )
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
    </section>
                        
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
