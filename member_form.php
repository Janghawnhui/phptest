c:\xampp\htdocs\project1\board_modify_form.php c:\xampp\htdocs\project1\board_modify.php<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>음악 페스티벌</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/member.css">
    <script>
        function check_input() {
            if (!document.member_form.id.value) {
                alert("아이디를 입력하세요!");
                document.member_form.id.focus();
                return;
            }

            if (!document.member_form.name.value) {
                alert("이름을 입력하세요!");
                document.member_form.name.focus();
                return;
            }
            if (!document.member_form.age.value) {
                alert("나이를 입력하세요!");
                document.member_form.age.focus();
                return;
            }
            if (!document.member_form.passwd.value) {
                alert("비밀번호를 입력하세요!");
                document.member_form.passwd.focus();
                return;
            }

            if (!document.member_form.passwd_confirm.value) {
                alert("비밀번호확인을 입력하세요!");
                document.member_form.passwd_confirm.focus();
                return;
            }
            if (!document.member_form.phonenum.value) {
                alert("전화번호를 입력하세요!");
                document.member_form.phonenum.focus();
                return;
            }


            if (document.member_form.passwd.value !=
                document.member_form.passwd_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
                document.member_form.passwd.focus();
                document.member_form.passwd.select();
                return;
            }
           
            document.member_form.submit();

        }

        function check_id() { //회원가입 페이지에서 아이디 입력 창 옆의 중복하기 버튼을 클릭하면 중복되는지 검사
            window.open("member_check_id.php?id=" + document.member_form.id.value,
                "IDcheck",
                "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        }
    </script>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="main_img_bar">
            <img src="./img/main.jpg" height="200">
        </div>
        <div id="main_content">
            <div id="join_box">
                <form name="member_form" method="post" action="member_insert.php" enctype="multipart/form-data">
                    <h2>회원 가입</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <input type="text" name="id">
                        </div>
                        <div class="col3">
                            <a href="#"><img src="./img/check_id.gif" onclick="check_id()"></a>
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name">
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">나이</div>
                        <div class="col2">
                            <input type="text" name="age">
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <input type="password" name="passwd">
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2">
                            <input type="password" name="passwd_confirm">
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">전화번호</div>
                        <div class="col2">
                            <input type="text" name="phonenum">
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">주소</div>
                        <div class="col2">
                            <input type="text" name="address">
                        </div>
                    </div>

                    <div class="col0">성별</div>

                    <div class="col1"></div>
                    <div class="col4">
                        <label><input type="radio" name="gender" value="male"> 남</label>
                        <label><input type="radio" name="gender" value="female"> 여</label>
                    </div>
                    <div class="form"></div>

                    <div class="col0">취미</div>

                    <div class="col1"></div>
                    <div class="col4">
                        <label><input type="checkbox" name="hobby[]" value="Jazz">재즈</label>
                        <label><input type="checkbox" name="hobby[]" value="classic">클래식</label>
                        <label><input type="checkbox" name="hobby[]" value="pop">POP</label>
                        <label><input type="checkbox" name="hobby[]" value="edm">EDM</label>
                        <label><input type="checkbox" name="hobby[]" value="idol">아이돌</label>
                    </div>

                    <div class="form"></div>
                    <div class="form">
                        <div class="col1">자기소개</div>
                        <div class="col2">
                            <input type="text" name="introduce">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">대표 이미지</div>
                        <div class="col2">
                            <input type="file" name="upfile">
                        </div>
                    </div>

                    <div class="col1">뮤지선 여부</div>

                    <div class="col1"></div>
                    <div class="col4">
                        <label><input type="radio" name="musician" value="musician"> 뮤지션</label>
                        <label><input type="radio" name="musician" value="normal"> 일반인</label>
                    </div>

                    <div class="bottom_line"> </div>
                    <div class="buttons">
                        <img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                       
                    </div>
                </form>
            </div> <!-- join_box -->
        </div> <!-- main_content -->
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>