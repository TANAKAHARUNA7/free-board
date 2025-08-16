<?php
session_start();


// POST방식으로 id, name, title, content, pw를 받는다.
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (isset($_POST['name']) && isset($_POST['title'])
        && isset($_POST['content']) && isset($_POST['pw']))
    {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $pw = $_POST['pw'];
    } else {
        $_SESSION['empty_error'] = "모든 빌드를 입력하세요.";
        $_SESSION['id'] = $id;
        header("Refresh: 2; URL='edit.php'");
        exit;
    }
} else {
    header("Refresh: 2; URL='edit.php'");
    echo "id전달 오류 발생";
    exit;
}

// DB연결
require_once("./db_conn.php");
$db_conn = new mysqli(
    db_info::DB_HOST,
    db_info::DB_USER,
    db_info::DB_PASSWORD,
    db_info::DB_NAME
);

if ($db_conn->connect_errno) {
    header("Refresh: 2; URL='edit.php'");
    echo "DB연결 오류발생";
    exit;
}

// id로 pw 가져오기
$pw_sql = "SELECT pw FROM posts WHERE id='$id'";
$pw_result = $db_conn->query($pw_sql);
$row = $pw_result->fetch_assoc();

// password_verify로 비밀번호 비교
// ** 맞으면 -> 수정 내용을 UPDATE
if (password_verify($pw, $row['pw'])) {

    $update_sql = " UPDATE posts SET name='$name', title='$title', 
                    content='$content', updated_at=NOW() WHERE id='$id'";

    $update_result = $db_conn->query($update_sql);
    if ($update_result) {
        header("Refresh: 2; URL='view.php'");
        echo "수정이 완료 되었습니다.";
        exit;
    } else {
        header("Refresh: 2; URL='edit.php'");
        echo "시스템 오류가 발생했습니다.";
        exit;
    }
    // ** 안 맞으면 -> 오류 메시지 표시 & edit.php로 이동하기
} else {
    echo "비밀번호가 들렸습니다.";
    exit;
}
