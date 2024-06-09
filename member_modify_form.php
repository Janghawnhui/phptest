<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"> </script>
</head>
<body> 
    <header>
        <?php include "header.php";?>
    </header>
<?php    
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

    mysqli_close($con);
?>
    <section>
        <div id="main_img_bar">
            <img src="./img/main.jpg" height="200">
        </div>
        <div id="main_content">
            <div id="join_box">
                <form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>" enctype="multipart/form-data">
                    <h2>회원 정보수정</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <?=$userid?>
                        </div>                 
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <input type="password" name="passwd" value="<?=$passwd?>">
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2">
                            <input type="password" name="passwd_confirm" value="<?=$passwd?>">
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name" value="<?=$name?>">
                        </div>                 
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">나이</div>
                        <div class="col2">
                            <input type="text" name="age" value="<?=$age?>">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">전화번호</div>
                        <div class="col2">
                            <input type="text" name="phonenum" value="<?=$phonenum?>">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">주소</div>
                        <div class="col2">
                            <input type="text" name="address" value="<?=$address?>">
                        </div>
                    </div>
                    <div class="clear"></div>
                        <div class="col0">성별</div>
                        <div class="col1"></div>
						<div class="col4">
                            <label><input type="radio" name="gender" value="male" <?= ($gender == 'male') ? 'checked' : '' ?>> 남</label>
                            <label><input type="radio" name="gender" value="female" <?= ($gender == 'female') ? 'checked' : '' ?>> 여</label>
                        </div>
                   
                    <div class="clear"></div>

                    <div class="form"></div>

                    <div class="col0">취미</div>

                    <div class="col1"></div>
                    <div class="col4">
                            <label><input type="checkbox" name="hobby[]" value="Jazz" <?= in_array('Jazz', $hobby) ? 'checked' : '' ?>> 재즈</label>
                            <label><input type="checkbox" name="hobby[]" value="classic" <?= in_array('classic', $hobby) ? 'checked' : '' ?>> 클래식</label>
                            <label><input type="checkbox" name="hobby[]" value="pop" <?= in_array('pop', $hobby) ? 'checked' : '' ?>> POP</label>
                            <label><input type="checkbox" name="hobby[]" value="edm" <?= in_array('edm', $hobby) ? 'checked' : '' ?>> EDM</label>
                            <label><input type="checkbox" name="hobby[]" value="idol" <?= in_array('idol', $hobby) ? 'checked' : '' ?>> 아이돌</label>
                        </div>
                    
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">자기소개</div>
                        <div class="col2">
                            <input type="text" name="introduce" value="<?=$introduce?>">
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">대표 이미지</div>		
                        <div class="col2">
                            <input type="file" name="upfile" value="<?=$upfile?>">
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="col1">뮤지선 여부</div>

                    <div class="col1"></div>
                    <div class="col4">
                            <label><input type="radio" name="musician" value="musician" <?= ($musician == 'musician') ? 'checked' : '' ?>> 뮤지션</label>
                            <label><input type="radio" name="musician" value="normal" <?= ($musician == 'normal') ? 'checked' : '' ?>> 일반인</label>
                        </div>
                    <div class="clear"></div>
                    <div class="bottom_line"> </div>
                    <div class="buttons">
                        <img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                        <img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                            onclick="reset_form()">
                    </div>
                </form>
            </div> <!-- join_box -->
        </div> <!-- main_content -->
    </section> 
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>
