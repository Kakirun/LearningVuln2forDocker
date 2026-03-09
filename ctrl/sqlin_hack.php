<?php
//**************************************************
// 初期処理
//**************************************************
    //データベース接続関数の定義ファイルを読み込み
    require_once('../model/dbconnect.php');

    // データベース接続
    $conn = db_connect();

//**************************************************
// 変数取得
//**************************************************
    // ユーザー名を受け取る（なければ空文字）
    $name_input = isset($_POST['user_name']) ? $_POST['user_name'] : "";
    
    // パスワードを受け取る
    $pass_input = isset($_POST['user_pass']) ? $_POST['user_pass'] : "";

//**************************************************
// ユーザー検索データの取得
//**************************************************
    // フォームからの入力を処理
    $search_result = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // SQLインジェクション対策なし
        $query = "SELECT * FROM user_table WHERE user_name = '$name_input' AND user_pass = '$pass_input'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $search_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            echo "エラー: " . mysqli_error($conn);
        }
    }

//**************************************************
// DBリセット処理
//**************************************************
// リセット完了メッセージの受け取り
$system_message = "";
if (isset($_GET['msg']) && $_GET['msg'] === 'reset_success') {
    $system_message = "データベースを初期状態にリセットしました。";
}

//**************************************************
// HTMLを出力
//**************************************************
    //画面へ表示
    require_once('../view/sqlin_hack.html');
?>