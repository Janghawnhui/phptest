
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 페스티벌</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script>
   function check_input()
   {
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
          alert("비밀번호가 일치하지 않습니다. 다시 입력해 주세요!");
          document.member_form.passwd.focus();
          document.member_form.passwd.select();
          return;
      }
      document.member_form.submit();  // 사용자가 입력한 데이터를 POST 방식으로 전달
   }

   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.passwd.value = "";
      document.member_form.passwd_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.age.value = "";
      document.member_form.phonenum.value = "";
      document.member_form.address.value = "";
      document.member_form.hobbies.value = "";
      document.member_form.interests.value = "";
      document.member_form.profile_image.value = "";
      document.member_form.is_musician.checked = false;
      document.member_form.introduce.value = "";
      document.member_form.id.focus();
      return;
   }
</script>
</head>
<body>
    <header>
        <?php include "header.php";?>
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
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name">
                        </div>                 
                    </div>
                    
                    <div class="form">
                        <div class="col1">나이</div>
                        <div class="col2">
                            <input type="number" name="age">
                        </div>                 
                    </div>
                    
                    <div class="form">
                        <div class="col1">전화번호</div>
                        <div class="col2">
                            <input type="text" name="phonenum">
                        </div>                 
                    </div>
                    
                    <div class="form2">
                        <div class="col0">성별</div>
                        <div class="col1"></div>
                        <div class="col4">
                            <input type="radio" name="gender" value="M ">남 
                            <input type="radio" name="gender" value="F"> 여
                        </div>                 
                    </div>
                    
                    <div class="form">
                        <div class="col1">주소</div>
                        <div class="col2">
                            <input type="text" name="address">
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form2">
                        <div class="col0">관심 분야</div>
                        <div class="col1"></div>
                        <div class="col4">
                            <input type="checkbox" name="interests[]" value="Jazz"> 재즈
                            <input type="checkbox" name="interests[]" value="Classic"> 클래식
                            <input type="checkbox" name="interests[]" value="Idol"> 아이돌
                            <input type="checkbox" name="interests[]" value="POP"> POP
                            <input type="checkbox" name="interests[]" value="EDM"> EDM
                        </div>                 
                    </div>
                    
                    <div class="form">
                        <div class="col1">프로필 이미지</div>
                        <div class="col2">
                            <input type="file" name="profile_image">
                        </div>                 
                    </div>
                    
                    <div class="form">
                        <div class="col1">뮤지션 여부</div>
                        <div class="col2">
                            <input type="checkbox" name="is_musician">
                        </div>                 
                    </div>
                    
                    <div class="form">
                        <div class="col1">자기소개</div>
                        <div class="col2">
                            <input type="text" name="introduce">
                        </div>                 
                    </div>

                    
                    <div class="bottom_line"> </div>
                    <div class="buttons">
                        <img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                        <img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif" onclick="reset_form()">
                        
                    </div>
                </form>
            </div> <!-- join_box -->
        </div> <!-- main_content -->
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
        
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>
