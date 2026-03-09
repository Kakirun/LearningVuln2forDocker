<?php
require_once('./dbconnect.php');

// DB接続
$conn = db_connect();

// 1. 既存のテーブルを削除（存在すれば）
$sql_drop = "DROP TABLE IF EXISTS prob1_table1";
mysqli_query($conn, $sql_drop);

// 2. テーブルを再作成
$sql_create = "CREATE TABLE prob1_table1 (
    user_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_class VARCHAR(255) NOT NULL,
    user_pass VARCHAR(255) NOT NULL
)";
if (!mysqli_query($conn, $sql_create)) {
    die("テーブル作成エラー: " . mysqli_error($conn));
}

// 3. 初期データの投入
$sql_insert = "INSERT INTO prob1_table1 (user_name, user_class, user_pass) VALUES 
    ('安部', 'Editor', 'a1s2d3f4'),
    ('伊藤', 'Viewer', 'q1w2e3r4'),
    ('上野', 'Viewer', 'z1x2c3v4'),
    ('遠藤', 'Viewer', 'P0_wE_r1'),
    ('大田', 'Viewer', 'Lk9_jH7g'),
    ('加藤', 'Editor', 'mN5_bV3c'),
    ('木村', 'Viewer', 'uS3_rN4m'),
    ('工藤', 'Viewer', '2025test'),
    ('剣持', 'Viewer', 'april001'),
    ('小林', 'Viewer', 'mnbvcxz1'),
    ('佐藤', 'Viewer', '!QAZ2wsx'),
    ('清水', 'Viewer', '2025pass'),
    ('鈴木', 'Viewer', '5tGb7uJm'),
    ('千石', 'Admin', '{A9!f@d3P#XB2^T5z&CK7!xY#rV8Dp4%Zc*M6w}'),
    ('曽根', 'Viewer', '9oKi8uHy'),
    ('田中', 'Viewer', 'Xk9vL2mP'),
    ('千葉', 'Editor', 'qR4tZ7wY'),
    ('土屋', 'Viewer', 'bN3hJ8dF'),
    ('寺田', 'Viewer', 'mK6pL9sA'),
    ('徳田', 'Viewer', 'cV2gH5jQ'),
    ('中村', 'Viewer', 'zX8dB1nC'),
    ('西村', 'Viewer', 'wE4rT7yU'),
    ('沼田', 'Viewer', 'iO9pA2sD'),
    ('根本', 'Viewer', 'fG5hJ8kL'),
    ('野村', 'Viewer', 'vB3nM6qW'),
    ('林', 'Viewer', 'Y7uI4oP1'),
    ('平野', 'Viewer', 'tR2eW5qA'),
    ('藤原', 'Viewer', 'sD8fG3hJ'),
    ('逸見', 'Viewer', 'kL6zX9cV'),
    ('本田', 'Editor', 'bN1mQ4wE'),
    ('松本', 'Viewer', 'rT7yU2iO'),
    ('三浦', 'Viewer', 'pA5sD8fG'),
    ('村上', 'Viewer', 'hJ3kL6zX'),
    ('目黒', 'Viewer', 'cV9bN2mQ'),
    ('森', 'Editor', 'Eq9wA3sz'),
    ('山田', 'Viewer', 'qwertyui'),
    ('湯浅', 'Viewer', 'asdfghjk'),
    ('吉田', 'Viewer', 'z8xcvb6n'),
    ('瀬野', 'Editor', 'ijntf9s2'),
    ('力石', 'Viewer', 'rfghmnbk'),
    ('渡部', 'Viewer', 'plk4gred')
";

if (mysqli_query($conn, $sql_insert)) {
    // 成功したら元のページに戻る（リセット完了パラメータ付き）
    header("Location: ../ctrl/ctf_prob1_prob.php?msg=reset_success");
    exit;
} else {
    echo "データ登録エラー: " . mysqli_error($conn);
}
?>