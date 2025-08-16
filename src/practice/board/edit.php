<?php
session_start();

// id를 GET 방식으로 받기
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}


// DB연결
require_once("./db_conn.php");
$db_conn = new mysqli(
    db_info::DB_HOST,
    db_info::DB_USER,
    db_info::DB_PASSWORD,
    db_info::DB_NAME
);

// SELECT로 해당 ID의 글을 가져 오기
$sql = "SELECT * FROM posts WHERE id='$id'";
// 쿼리 실행
$result = $db_conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정</title>
</head>

<body>
    <!--     
        수정 form 기존 데이터 표시
        비밀번호 확인
        POST방식으로 edit_process.php에 비밀번호 전달하기 -->

    <h1>글 수정</h1>
    <hr>
    <form action="edit_process.php" method="post">
        <?php if ($row = $result->fetch_assoc()): ?>
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <p>제목:<input type="text" name="title" value="<?=$row['title']?>"> </p>
            <p>날짜: <?=$row['created_at']?></p>
            <p>이름: <input type="text" name="name" value="<?=$row['name']?>"></p>
            <p>내용: <textarea name="content" cols="30" rows="10"><?=$row['content']?></textarea></p>
            <p>비밀번호: <input type="password" name="pw"></p>
        <?php else : ?>
            글이 없습니다.
        <?php endif; ?>
        <?php if (isset($row['updated_at'])): ?>
            <p>수정 날짜: <?=$row['updated_at']?></p>
        <?php endif; ?>
        <button>수정하기</button>
        <input type="reset" value="초기화">
    </form>
    <hr>
    <button><a href="view.php?id=<?=$row['id']?>">돌아가기</a></button>

</body>
</html>