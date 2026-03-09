<?php
require_once('./dbconnect.php');

// DB接続
$conn = db_connect();

// 1. 既存のテーブルを削除（存在すれば）
$sql_drop = "DROP TABLE IF EXISTS user_table";
mysqli_query($conn, $sql_drop);

// 2. テーブルを再作成
$sql_create = "CREATE TABLE user_table (
    user_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_class VARCHAR(255) NOT NULL,
    user_pass VARCHAR(255) NOT NULL
)";
if (!mysqli_query($conn, $sql_create)) {
    die("テーブル作成エラー: " . mysqli_error($conn));
}

// 3. 初期データの投入
$sql_insert = "INSERT INTO user_table (user_name, user_class, user_pass) VALUES 
    ('Alex', 'admin', 'A9!f@d3P#X'),
    ('Ben', 'guest', 'B2^T5z&'),
    ('Chris', 'guest', 'CK7!xY#rV8'),
    ('David', 'guest', 'Dp4%Zc*M6w*'),
    ('Emma', 'guest', '*E!dT7@P3qX*'),
    ('Felix', 'guest', '*F5z#yL2*R9'),
    ('George', 'guest', 'GM6!wkD5n'),
    ('Henry', 'guest', 'HqX4!cJpZ%'),
    ('Isaac', 'guest', 'IP9N3dT7^L'),
    ('Jack', 'guest', 'J2#rV8m5z$'),
    ('Kevin', 'admin', 'KM6wJp4%'),
    ('Lucy', 'guest', 'L2!F5z#yR7')
";

if (mysqli_query($conn, $sql_insert)) {
    // 成功したら元のページに戻る（リセット完了パラメータ付き）
    header("Location: ../ctrl/sqlin_hack.php?msg=reset_success");
    exit;
} else {
    echo "データ登録エラー: " . mysqli_error($conn);
}
?>