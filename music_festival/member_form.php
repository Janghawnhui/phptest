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
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.phonenum.focus();
          return;
      }

      

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }
//document.member_form.~~.value의 각 요소
//document: 현재 웹 페이지의 문석 객체인 join_form.php파일 자체
//member_form:<form>태그 name 속성 값인 member_form
//~~: name속성 값
//전체: 회언가입 페이지의 입력창에 사용자가 입력한 데이터 의미
//if문 사용하여 데이터 입력하지 않을 시 alert에 의해 경고창 입력
      document.member_form.submit();
      //사용자가 입력한 데이터를 POST 방식으로 전달
   }

   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.id.focus();
      return;
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
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main.jpg" height ="200">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
				        </div>                 
			       	</div>
                       <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
                       <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">나이</div>
				        <div class="col2">
							<input type="text" name="age">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="passwd">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
                       <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">전화번호</div>
				        <div class="col2">
							<input type="text" name="phonenum">
				        </div>                            
                    </div>
                       <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">주소</div>
				        <div class="col2">
							<input type="text" name="address">
				        </div>                 
			       	</div>
                       <div class="clear"></div>
				        <div class="col1">성별</div>
				        <div class="col4">
                        <label><input type="radio" name="gender" value="male"> 남</label>
                        <label><input type="radio" name="gender" value="female"> 여</label>
                        </div>
                        <div class="form"></div>
                        <div class="clear"></div>
                        
                        <div class="col1">취미</div>
				        <div class="col4">
                        <label><input type="checkbox" name="hobby" value="Jazz">재즈</label>
                        <label><input type="checkbox" name="hobby" value="classic">클래식</label>
                        <label><input type="checkbox" name="hobby" value="pop">POP</label>
                        <label><input type="checkbox" name="hobby" value="edm">EDM</label>
                        <label><input type="checkbox" name="hobby" value="idol">아이돌</label>
			        </div>
                    <div class="form"></div>
                    <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">자기소개</div>
				        <div class="col2">
							<input type="text" name="introduce">
				        </div>                 
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
    <br><br><br><br><br><br><br><br><br><br><br>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

