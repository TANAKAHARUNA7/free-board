<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
</head>
<body>

    <?php 
    if (isset($_SESSION['error'])) {
        echo htmlspecialchars($_SESSION['error']);
    }
    
    ?>


    <h2>회원 가입</h2>
    <fieldset>
    <legend>정보 입력</legend>
    <form action="register_process.php" method="post">
        <label>아이디</label>
        <input type="text" name="username" required><br>
        <label>비밀번호</label>
        <input type="password" name="passwd" required><br>
        <label>이름</label>
        <input type="text" name="name" required><br>
        <input type="button" value="회원가입">
    </form>
    </fieldset>

</body>
</html>