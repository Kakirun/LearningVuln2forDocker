<?php
// データベース接続関数
function db_connect(){
    $host     = "db";
    $dbname   = "learningvulndb2";
    $user     = "root";
    $password = "password";

    // MySQL接続
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // 接続エラーチェック
    if (!$conn) {
        die("データベース接続失敗: " . mysqli_connect_error());
    }

    return $conn;
}
?>
