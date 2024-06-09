<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
} else {
    echo "
        <script>
            alert('로그인이 필요합니다.');
            history.go(-1);
        </script>
    ";
    exit;
}

$num = $_POST['num'];

$con = mysqli_connect("localhost", "user1", "12345", "music_festival");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// 찜 여부 확인
$sql = "SELECT * FROM likes WHERE user_id='$userid' AND post_id='$num'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // 이미 찜한 경우 -> 찜 취소
    $sql = "DELETE FROM likes WHERE user_id='$userid' AND post_id='$num'";
} else {
    // 찜하지 않은 경우 -> 찜 추가
    $sql = "INSERT INTO likes (user_id, post_id) VALUES ('$userid', '$num')";
}

if (mysqli_query($con, $sql)) {
    echo "
        <script>
            history.go(-1);
        </script>
    ";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
