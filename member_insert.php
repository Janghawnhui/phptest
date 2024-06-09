<?php
    $id   = $_POST["id"]; //회원가입 페이지에서 입력한 데이터
    $passwd = $_POST["passwd"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $phonenum= $_POST["phonenum"];
    $address = $_POST ["address"];
    $hobby = isset($_POST["hobby"]) ? implode(',', $_POST["hobby"]) : '';
    $introduce = $_POST ["introduce"];
    $musician = $_POST["musician"];
    
    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_size = $_FILES["upfile"]["size"];
    $upfile_error = $_FILES["upfile"]["error"];

    $upload_dir = './img/';

    if($musician == 'musician') {
        $level = 101;
    }
    else {$level = 10;}

    if ($upfile_name && !$upfile_error) { // 파일이 업로드되었고 오류가 없는 경우
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];

        $new_file_name = date("Y_m_d_H_i_s");
        $new_file_name = $new_file_name . "_" . $file_name . "." . $file_ext;
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
    } else {
        $new_file_name = "";
    }
    $con = mysqli_connect("localhost", "user1", "12345", "music_festival"); 
    //mysqli_connect() 함수를 이용하여 mysql 계정에 sample데이터베이스에 연결 성공:식별자 번호 실패:false
	$sql = "insert into member(id, passwd, name, age, gender, phonenum, address ,hobby, introduce, filename, musician, level, point)";
    //members 테이블에 id~point컬럼까지 데이터를 저장하는 명령을 $sql에 저장
	$sql .= "values('$id', '$passwd', '$name', '$age','$gender', '$phonenum','$address', '$hobby', '$introduce','$new_file_name','$musician', $level, 0)";
    //.= 연산을 통해서 sql에 데이터를 저장하는 명령 뒤에 입력할 값을 post받아서 넣어줌
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    //mysqli_query(연결할mysql, 명령어)
    mysqli_close($con); //다했으면 mysql서버와 연결 끊기   

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>