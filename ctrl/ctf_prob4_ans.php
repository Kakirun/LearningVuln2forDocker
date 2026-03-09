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
    // メッセージの初期化
    $message_sqlin = "";

//**************************************************
// 答え合わせの処理
//**************************************************
    // 第4問のフラッグ認識
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $input_sqlin = isset($_POST["user_input_sqlin"]) ? trim($_POST["user_input_sqlin"]) : "";

        if ($input_sqlin === "{6XyQGh6y2axXPe_KrAaeF7u6ueAGyX3Fu9y3Nzm7dSSeS3RdgyjYemCTdiXDCQjXd8NzKVPpNmCNMctwMibz82XTDpPaYCfkaVXZccUa45Az_UeEw_Xfwmia}") {
            $message_sqlin = "第4問正解！";
        }else{
            $message_sqlin = "答えが違います";
        }
    }

//**************************************************
// HTMLを出力
//**************************************************
    //画面へ表示(ディレクトリトラバーサルの実装で出力している)
    require_once('../view/ctf_prob4_ans.html');
?>