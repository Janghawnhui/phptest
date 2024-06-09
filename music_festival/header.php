<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
<div id="top">
            <h3>
                <a href="index.php">음악 페스티벌</a>
            </h3>
            <ul id="top_menu">  
            <?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    }   else {
        $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
        <li><?=$logged?> </li>
        <li> | </li>
        <li><a href="logout.php">로그아웃(12장)</a> </li>
        <li> | </li>
        <li><a href="member_modify_form.php">정보 수정(12장)</a></li>
        <?php
    }
?>