<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";

if (!$userid) {
    echo("
        <script>
        alert('로그인 후 이용해주세요!');
        history.go(-1);
        </script>
    ");
    exit;
}

$num = $_POST["num"];
$page = $_POST["page"];
$action = $_POST["action"];

$con = mysqli_connect("localhost", "user1", "12345", "music_festival");

if ($action == 'reserve') {
    $sql = "insert into reservations (user_id, board_num, reserve_date) select '$userid', $num, reserve_date from festival_board where num=$num";
    mysqli_query($con, $sql);
    echo "
        <script>
        alert('예약이 완료되었습니다.');
        location.href = 'board_festival_list.php?page=$page';
        </script>
    ";
} else {
    $sql = "delete from reservations where user_id='$userid' and board_num=$num";
    mysqli_query($con, $sql);
    echo "
        <script>
        alert('예약이 취소되었습니다.');
        location.href = 'board_festival_list.php?page=$page';
        </script>
    ";
}

mysqli_close($con);
?>
