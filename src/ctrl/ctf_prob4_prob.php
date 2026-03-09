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
    $login_message = ""; // 画面表示用のメッセージ変数を用意
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // SQLインジェクション対策なし
        $query = "SELECT * FROM prob4_table1 WHERE user_name = '$name_input' AND user_pass = '$pass_input'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $search_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // 結果が1件以上ある場合、1件目(index 0)のデータで判定を行う
            if (!empty($search_result)) {
                $first_row = $search_result[0]; // 1行目を取り出す
                
                if ($first_row['user_class'] === '一般') {
                     $login_message = "一般ユーザーとしてログインしました。<br>あなたは管理者ユーザーの保存するファイルの参照権限を持っていません。";
                } elseif ($first_row['user_class'] === '管理者') {
                     $login_message = "管理者ユーザーとしてログインしました。<br>管理者ユーザーの保存するファイル名：" . htmlspecialchars($first_row['user_file']);
                }
            } else {
                $login_message = "ユーザー名またはパスワードが違います。";
            }

        } else {
            $login_message = "エラー: " . mysqli_error($conn);
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
    require_once('../view/ctf_prob4_prob.html');
?>