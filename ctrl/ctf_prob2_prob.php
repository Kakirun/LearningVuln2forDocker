<?php
//**************************************************
// 初期処理
//**************************************************
    //データベース接続関数の定義ファイルを読み込み
    require_once('../model/dbconnect.php');

    // データベース接続
    $conn = db_connect();

    // ブラウザのXSS保護機能を無効化（学習用設定）
    header('X-XSS-Protection: 0');

    // フラッグをCookieにセット（有効期限1時間、パス全体、HttpOnlyなし）
    setrawcookie("Cookie", "FLAG{cY52a3UcrPW5xuz6VKxSeDxVgpmnH6}", time() + 3600, "/");

    // フォームから送信されたコメントを受け取る
    $comment = "";
    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
    }

//**************************************************
// HTMLを出力
//**************************************************
    //画面へ表示(ディレクトリトラバーサルの実装で出力している)
    require_once('../view/ctf_prob2_prob.html');
?>