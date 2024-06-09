<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="admin_box">
        <h3 id="member_title">
            관리자 모드 > 회원 관리
        </h3>
        <ul id="member_list">
            <li>
                <span class="col1">번호</span>
                <span class="col2">아이디</span>
                <span class="col3">이름</span>
                <span class="col3">나이</span>
                <span class="col6">전화번호</span>
                <span class="col6">주소</span>
                <span class="col4">레벨</span>
                <span class="col5">포인트</span>
                <span class="col6">뮤지선</span>
                <span class="col7">수정</span>
                <span class="col8">삭제</span>
            </li>
            <?php
            // MySQL 데이터베이스에 연결
            $con = mysqli_connect("localhost", "user1", "12345", "music_festival");
            // members 테이블에서 모든 회원 정보를 가져오는 쿼리 실행
            $sql = "select * from member order by num desc";
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result); // 전체 회원 수

            $number = $total_record;

            while ($row = mysqli_fetch_array($result))
            {
                $num         = $row["num"];
                $id          = $row["id"];
                $name        = $row["name"];
                $age         = $row["age"];
                $phonenum    = $row["phonenum"];
                $address     = $row["address"];
                $level       = $row["level"];
                $point       = $row["point"];
                $musician    = $row["musician"];
            ?>
            <li>
                <!-- 회원 정보를 수정할 수 있는 폼 생성 -->
                <form method="post" action="admin_member_update.php?num=<?=$num?>">
                    <span class="col1"><?=$number?></span>
                    <span class="col2"><?=$id?></a></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col3"><input type="text" name="age" value="<?=$age?>"></span>
                    <span class="col6"><input type="text" name="phonenum" value="<?=$phonenum?>" style="width:150px"></span>
                    <span class="col6"><input type="text" name="address" value="<?=$address?>" style="width:190px"></span>&nbsp;&nbsp;
                    <!-- 레벨과 포인트를 수정할 수 있도록 입력 필드 제공 -->
                    <span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
                    <span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
                    <span class="col6"><label><input type="radio" name="musician" value="musician" <?= ($musician == 'musician') ? 'checked' : '' ?>> 뮤지션</label>
                    <label><input type="radio" name="musician" value="normal" <?= ($musician == 'normal') ? 'checked' : '' ?>> 일반</label></span>
                    <span class="col7"><button type="submit">수정</button></span>
                    <span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>

                </form>
            </li>    
            <?php
                $number--;
            }
            ?>
        </ul>
        
        <div id="admin_list_box">
            <h3 id="member_title">
                관리자 모드 > 뮤지션 게시판 관리
            </h3>
            <ul id="board_list">
                <li class="title">
                    <span class="col1">선택</span>
                    <span class="col2">번호</span>
                    <span class="col3">이름</span>
                    <span class="col4">제목</span>
                    <span class="col5">첨부파일명</span>
                    <span class="col6">작성일</span>
                </li>
                <!-- 선택된 게시글을 삭제할 수 있는 폼 생성 -->
                <form method="post" action="admin_board_delete.php">
                <?php
                // board 테이블에서 모든 게시글 정보를 가져오는 쿼리 실행
                $sql = "select * from board order by num desc";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글의 수

                $number = $total_record;

                while ($row = mysqli_fetch_array($result))
                {
                    $num         = $row["num"];
                    $name        = $row["name"];
                    $subject     = $row["subject"];
                    $file_name   = $row["file_name"];
                    $regist_day  = $row["regist_day"];
                    $regist_day  = substr($regist_day, 0, 10); // 날짜 형식을 YYYY-MM-DD로 변경
                ?>
                <li>
                    <!-- 체크박스를 통해 게시글 선택 -->
                    <span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
                    <span class="col2"><?=$number?></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$subject?></span>
                    <span class="col5"><?=$file_name?></span>
                    <span class="col6"><?=$regist_day?></span>
                </li>    
                <?php
                    $number--;
                }
                ?>
                <!-- 선택된 글 삭제 버튼 -->
                <button type="submit">선택된 글 삭제</button>
                </form>
            </ul>
        </div>

        <div id="admin_list_box">
            <h3 id="member_title">
                관리자 모드 > 자유 게시판 관리
            </h3>
            <ul id="board_list">
                <li class="title">
                    <span class="col1">선택</span>
                    <span class="col2">번호</span>
                    <span class="col3">이름</span>
                    <span class="col4">제목</span>
                    <span class="col5">첨부파일명</span>
                    <span class="col6">작성일</span>
                </li>
                <!-- 선택된 게시글을 삭제할 수 있는 폼 생성 -->
                <form method="post" action="admin_free_board_delete.php">
                <?php
                // 새로운 board 테이블에서 모든 게시글 정보를 가져오는 쿼리 실행
                $sql = "select * from free_board order by num desc";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글의 수

                $number = $total_record;

                while ($row = mysqli_fetch_array($result))
                {
                    $num         = $row["num"];
                    $name        = $row["name"];
                    $subject     = $row["subject"];
                    $file_name   = $row["file_name"];
                    $regist_day  = $row["regist_day"];
                    $regist_day  = substr($regist_day, 0, 10); // 날짜 형식을 YYYY-MM-DD로 변경
                ?>
                <li>
                    <!-- 체크박스를 통해 게시글 선택 -->
                    <span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
                    <span class="col2"><?=$number?></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$subject?></span>
                    <span class="col5"><?=$file_name?></span>
                    <span class="col6"><?=$regist_day?></span>
                </li>    
                <?php
                    $number--;
                }
                mysqli_close($con); // MySQL 연결 종료
                ?>
                <!-- 선택된 글 삭제 버튼 -->
                <button type="submit">선택된 글 삭제</button>
                </form>
            </ul>
        </div><!-- admin_box -->

    </div>
</section> 
<footer>
    <?php include "footer.php";?> <!-- 푸터 파일을 포함하여 하단 푸터를 표시 -->
</footer>
</body>
</html>
