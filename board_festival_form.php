<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() { //사용자가 꼭 입력해야 하는 항목 표시
      if (!document.board_festival_form.subject.value) {
          alert("제목을 입력하세요!");
          document.board_festival_form.subject.focus();
          return;
      }
      if (!document.board_festival_form.content.value) {
          alert("내용을 입력하세요!");    
          document.board_festival_form.content.focus();
          return;
      }
      if (!document.board_festival_form.reserve_date.value) {
          alert("예약 날짜를 입력하세요!");    
          document.board_festival_form.reserve_date.focus();
          return;
      }
      document.board_festival_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<?php
	if (!$userid) {   
        echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>");
		exit;
	}
    if ($userlevel != 1) {
		echo("<script>
				alert('관리자만 이용할 수 있습니다.');
				history.go(-1);
				</script>");
		exit;
    }
?>
<section>
	<div id="main_img_bar">
        <img src="./img/main.jpg" height="200">
    </div>
   	<div id="board_box">
	    <h3 id="board_title">게시판 > 글 쓰기</h3>
	    <form name="board_festival_form" method="post" action="board_festival_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2"><textarea name="content"></textarea></span>
	    		</li>
	    		<li>
			        <span class="col1">첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
			    <li>
			        <span class="col1">예약 날짜</span>
			        <span class="col2"><input type="date" name="reserve_date"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='board_festival_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
