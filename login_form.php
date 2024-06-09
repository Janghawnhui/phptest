<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<script type="text/javascript" src="./js/login.js"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main.jpg"height="200">
        </div>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">	
					<!-- form 태그 이용하여 name 속성을 login_form 으로 action속성을 login.php로 설정-->
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
					<!-- 아이디와 비밀번호 입력 창의 name속성을 id와 pass로 설정-->
                    <li><input type="password" id="pass" name="passwd" placeholder="비밀번호" ></li> <!-- pass -->
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/login.png" onclick="check_input()"></a>
                  	</div>		    	
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

