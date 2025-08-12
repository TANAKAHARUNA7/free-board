<?php
require_once("./db_conn.php");
    
$db_conn = new mysqli(
    db_info::DB_HOST,
    db_info::DB_USER,
    db_info::DB_PASSWORD,
    db_info::DB_NAME
);
    
$sql = "SELECT * FROM posts";
$result = $db_conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    
}
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 목록</title>
</head>

<body>
    <!--
        이름
        제목 (클릭하면 view.php로 이동)
        내용
        작성 날자를 표시

        1. 글 리스트
        2. 글 쓰기 버튼  
        3. 페이지 이동 제공
    -->

    

    <h1>글 목록</h1>

    <table border="1">
        <tr>
            <th>이름</th>
            <th>제목</th>
            <th>내용</th>
            <th>날짜</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

</body>

</html>