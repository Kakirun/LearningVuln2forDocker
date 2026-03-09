// windowオブジェクトに登録することで、コンソールから直接呼び出せる。
window.findFlag = function(secretKey) {
    // SVGの中に隠したパスワードと同じものを設定してください
    const CORRECT_KEY = "hidden_in_svg_file"; 

    if (secretKey === CORRECT_KEY) {
        // 正解の場合
        console.log("正解です！");
        console.log("Flag{2390712496699563}");
        return true;
    } else {
        // 不正解の場合
        console.error("間違いです。SVGファイルをもう一度確認してください。");
        return false;
    }
};