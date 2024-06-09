<?php
    $real_name = $_GET["real_name"];//첨부파일 정보 전달
    $file_name = $_GET["file_name"];
    $file_type = $_GET["file_type"];
    $file_path = "./img/".$real_name;

    if( file_exists($file_path) ) //경로에서 파일 확인
    { 
		$fp = fopen($file_path,"rb"); //rb모드: 바이너리 형식으로 파일열기
		Header("Content-type: application/x-msdownload"); 
        Header("Content-Length: ".filesize($file_path));     
        Header("Content-Disposition: attachment; filename=".$file_name);   
        Header("Content-Transfer-Encoding: binary"); 
		Header("Content-Description: File Transfer"); 
        Header("Expires: 0");       
    } 
	
    if(!fpassthru($fp)) //파일 복사 끝났을시 닫음.
		fclose($fp); 
?>
    