<?php
    $id = $_GET["id"];

    $passwd = $_POST["passwd"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender =$_POST["gender"];
    $phonenum= $_POST["phonenum"];
    $address = $_POST["address"];
    $hobby = isset($_POST["hobby"]) ? implode(',', $_POST["hobby"]) : '';
    $introduce =$_POST["introduce"];
    $musician = $_POST["musician"];

    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_size = $_FILES["upfile"]["size"];
    $upfile_error = $_FILES["upfile"]["error"];

    $upload_dir = './img/';

    if($musician == 'musician') {
        $level = 101;
    } else {
        $level = 10;
    }

    $con = mysqli_connect("localhost", "user1", "12345", "music_festival");

    // 현재 사용자의 기존 이미지 경로를 가져옴
    $sql = "SELECT filename FROM member WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_img = $row['filename'];

    // 새로운 이미지 파일이 업로드되었고 오류가 없는 경우
    if ($upfile_name && !$upfile_error) {
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];

        $new_file_name = date("Y_m_d_H_i_s") . "_" . $file_name . "." . $file_ext;
        $uploaded_file = $upload_dir . $new_file_name;

        if ($upfile_size > 1000000) {
            echo("
                <script>
                alert('파일 크기가 1MB를 초과합니다!');
                history.go(-1);
                </script>
            ");
            exit;
        }

        if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
            echo("
                <script>
                alert('파일을 지정한 디렉터리에 복사하는데 실패했습니다.');
                history.go(-1);
                </script>
            ");
            exit;
        }

        // 기존 이미지 파일이 있으면 삭제
        if ($current_img) {
            $current_img_path = $upload_dir . $current_img;
            if (file_exists($current_img_path)) {
                unlink($current_img_path);
            }
        }
    } else {
        $new_file_name = $current_img; // 기존 이미지 유지
    }

    // 데이터베이스 업데이트
    $sql = "UPDATE member SET passwd='$passwd', name='$name', age='$age', gender='$gender', phonenum='$phonenum', address='$address', hobby='$hobby', introduce='$introduce', musician='$musician', filename='$new_file_name' ,level ='$level' WHERE id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
          <script>
              location.href = 'index.php';
          </script>
    ";
?>
