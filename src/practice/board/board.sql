
CREATE DATABASE bulletin_board CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE bulletin_board;

CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    pw VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO posts (id, title, name, pw, content, created_at, updated_at ) 
VALUES (NULL, 'タイトル例', '山田太郎', '1234', '本文内容', NOW(), NULL);