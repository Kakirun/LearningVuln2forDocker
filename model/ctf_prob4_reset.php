<?php
require_once('./dbconnect.php');

// DB接続
$conn = db_connect();

// 1. 既存のテーブルを削除（存在すれば）
$sql_drop = "DROP TABLE IF EXISTS prob4_table1";
mysqli_query($conn, $sql_drop);

// 2. テーブルを再作成
$sql_create = "CREATE TABLE prob4_table1 (
    user_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    user_class VARCHAR(255) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    user_file VARCHAR(255)
)";
if (!mysqli_query($conn, $sql_create)) {
    die("テーブル作成エラー: " . mysqli_error($conn));
}

// 3. 初期データの投入
$sql_insert = "INSERT INTO prob4_table1 (user_name, user_class, user_pass, user_file) VALUES 
    ('野比', '一般', 'nobita', '' ),
    ('剛田', '一般', 'takeshi', ''),
    ('骨川', '管理者', 'ZwBXSAZtjVkmzRfE3cNiTfxTW8_knW', '{6XyQGh6y2axXPe_KrAaeF7u6ueAGyX3Fu9y3Nzm7dSSeS3RdgyjYemCTdiXDCQjXd8NzKVPpNmCNMctwMibz82XTDpPaYCfkaVXZccUa45Az_UeEw_Xfwmia}.txt')
";

if (mysqli_query($conn, $sql_insert)) {
    // 成功したら元のページに戻る（リセット完了パラメータ付き）
    header("Location: ../ctrl/ctf_prob4_prob.php?msg=reset_success");
    exit;
} else {
    echo "データ登録エラー: " . mysqli_error($conn);
}
?>