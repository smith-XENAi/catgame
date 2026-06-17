<?php
// 어떤 도메인에서든 접속을 허용합니다 (보안 우회)
header('Access-Control-Allow-Origin: *');

$url = isset($_GET['url']) ? trim($_GET['url']) : '';
$file = "master_tunnel.txt"; // 마스터 서버 주소 단 하나만 보관

if (!empty($url)) {
    // 스타터(파이썬)에서 마스터의 새 URL을 보냈을 때 -> 파일에 덮어쓰기
    file_put_contents($file, $url);
    echo "OK";
} else {
    // 뷰어나 대시보드가 주소를 물어볼 때 -> 읽어서 반환
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo "NONE";
    }
}
?>
