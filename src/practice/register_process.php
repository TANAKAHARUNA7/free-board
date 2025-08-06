<?php
session_start();

// DB읽기
require_once("db_conf.php");

// DB연결
$db_conn = new mysqli(
    db_info::DB_URL,
    db_info::USER_ID,
    db_info::PASSWORD,
    db_info::DB
);

// DB연결 실패시 오류 표시
if ($db_conn->connect_errno) {
    $_SESSION['error'] = "시스템 오류 발생.";
    header("Location: register.php");
    exit;
}

// POST 요청 처리
$password = $_POST['password'] ?? '';
$user_name = $_POST['username'] ?? '';
$name = $_POST['name'] ?? '';

// 유호성 검사
// - 유호하지 않는 경우 -> 오류 메시지 표시 + login.php로 리디렉션
// 입력이 비어 있는 경우
if($password === '' || $user_name === '' || $name === '') {
    $_SESSION['error'] = "모둔 빌두를 입력하세요.";
    header("Location: register.php");
    exit;
} 

// 유호한 경우 -> DB에서 중복된 아이디 유무를 확인
$query = "SELECT * FROM users WHERE username = '$user_name'";
$result = $db_conn->query($query);

if($result === 1062){
    $_SESSION['error'] = "중복된 아이디입니다.";
}

// DB에서 아이디 중복 없으면 비밀번호를 해시 처리
// DB에 정보를 저장
// login.php로 리디렉션 + 회원가입 성공 메시지 표시

// DB에서 아이디 중복이 있으면 login.php로 리디렉션 + 오류 메시지 표시





?>