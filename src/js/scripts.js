/*!
* Start Bootstrap - Agency v7.0.12 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    //  Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

// クリップボードにテキストをコピーする関数
function copyToClipboard(text) {
    // クリップボードAPIを使用してテキストをコピー
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
            // コピー成功時のアラート（ユーザーへのフィードバック）
            alert('「' + text + '」をコピーしました！');
        }).catch(function(err) {
            console.error('コピーに失敗しました', err);
        });
    } else {
        alert('お使いのブラウザはコピー機能に対応していません');
    }
}

// CTF用タイマー機能の実装
// HTMLの要素を取得します
const timerElement = document.getElementById('timer');
const startButton = document.getElementById('startButton');
const stopButton = document.getElementById('stopButton');
const resetButton = document.getElementById('resetButton');
const probButton = document.getElementById('probButton');
const dummyProbButton = document.getElementById('dummyProbButton');
const answerButton = document.getElementById('answerButton');
const dummyAnswerButton = document.getElementById('dummyAnswerButton');

// --- 状態管理 ---
// 現在のページのファイル名を取得
const pathName = window.location.pathname;
const fileName = pathName.substring(pathName.lastIndexOf('/') + 1);

// ファイル名を含めた各ページのキーを生成
const STORAGE_KEY = 'learningVulnTimerState_' + fileName;

let timerId = null; // setIntervalのID

// タイマーの状態をまとめて管理するオブジェクト
let timerState = {
    elapsedTime: 0,   // 蓄積された経過時間 (ミリ秒単位)
    startTime: 0,     // タイマーを開始/再開した時のタイムスタンプ
    isRunning: false, // タイマーが動作中かどうかのフラグ
};

// --- 関数定義 ---

// 問題ページへの移動ボタンの表示/非表示を切り替える関数
function toggleProbButton(isTimerRunning) {
    if (isTimerRunning) {
        // タイマーが動いている時： 本物のボタンを表示し、ダミーを隠す
        probButton.style.display = 'inline-block';
        dummyProbButton.style.display = 'none';
    } else {
        // タイマーが止まっている時： 本物のボタンを隠し、ダミーを表示
        probButton.style.display = 'none';
        dummyProbButton.style.display = 'inline-block';
    }
}

// 答え合わせボタンの表示/非表示を切り替える関数
function toggleAnswerButton(isTimerRunning) {
    if (isTimerRunning) {
        // タイマーが動いている時： 本物のボタンを隠し、ダミーを表示
        answerButton.style.display = 'none';
        dummyAnswerButton.style.display = 'inline-block';
    } else {
        // タイマーが止まっている時： 本物のボタンを表示し、ダミーを隠す
        answerButton.style.display = 'inline-block';
        dummyAnswerButton.style.display = 'none';
    }
}

// localStorageに現在のタイマー状態を保存する関数
function saveState() {
    // startTimeは毎回更新するので、保存するのはelapsedTimeとisRunning
    const stateToSave = {
        elapsedTime: timerState.elapsedTime,
        isRunning: timerState.isRunning,
    };
    localStorage.setItem(STORAGE_KEY, JSON.stringify(stateToSave));
}

// ミリ秒を「時:分:秒.ミリ秒(2桁)」の形式に変換する関数
function formatTime(totalMilliseconds) {
    const totalCentiseconds = Math.floor(totalMilliseconds / 10);
    const h = String(Math.floor(totalCentiseconds / 360000)).padStart(2, '0');
    const m = String(Math.floor((totalCentiseconds % 360000) / 6000)).padStart(2, '0');
    const s = String(Math.floor((totalCentiseconds % 6000) / 100)).padStart(2, '0');
    const cs = String(totalCentiseconds % 100).padStart(2, '0');
    return `${h}:${m}:${s}.${cs}`;
}

// 画面のタイマー表示を更新する関数
function updateDisplay() {
    let displayTime = timerState.elapsedTime;
    // タイマーが動いている場合は、現在の経過時間を加算して表示
    if (timerState.isRunning) {
        displayTime += Date.now() - timerState.startTime;
    }
    timerElement.textContent = formatTime(displayTime);
}

// タイマーを開始する関数
function startTimer() {
    if (timerState.isRunning) return;
    timerState.isRunning = true;
    // 経過時間の計算の起点となるタイムスタンプを記録
    timerState.startTime = Date.now();
    // 10ミリ秒ごとに画面を更新
    timerId = setInterval(updateDisplay, 10);
    saveState();
    toggleAnswerButton(true); 
    toggleProbButton(true);
}

// タイマーを停止する関数
function stopTimer() {
    if (!timerState.isRunning) return;
    timerState.isRunning = false;
    // 停止した時点までの経過時間をelapsedTimeに加算
    timerState.elapsedTime += Date.now() - timerState.startTime;
    clearInterval(timerId);
    timerId = null;
    updateDisplay(); // 最終時間を表示
    saveState();
    toggleAnswerButton(false);
    toggleProbButton(false);
}

// タイマーをリセットする関数
function resetTimer() {
    // タイマーが動いていれば止める
    if (timerState.isRunning) {
        clearInterval(timerId);
        timerId = null;
    }
    
    // 状態を初期値に戻す
    timerState.elapsedTime = 0;
    timerState.isRunning = false;
    timerState.startTime = 0;

    // 画面表示を0に戻す
    updateDisplay();

    // localStorageに保存したデータを削除する
    localStorage.removeItem(STORAGE_KEY);

    toggleAnswerButton(false);
    toggleProbButton(false);
}

// --- 初期化処理 ---

// ページ読み込み時にlocalStorageから状態を復元する
function initializeTimer() {
    const savedStateJSON = localStorage.getItem(STORAGE_KEY);
    
    if (savedStateJSON) {
        const savedState = JSON.parse(savedStateJSON);
        timerState.elapsedTime = savedState.elapsedTime;
        
        // もし保存された状態が「実行中」だったら、タイマーを再開
        if (savedState.isRunning) {
            startTimer();
        }
    }
    
    // 復元した時間で初期表示を更新
    updateDisplay();
    // ページ読み込み時のボタン状態を設定
    toggleAnswerButton(timerState.isRunning);
    toggleProbButton(timerState.isRunning);
}

// --- イベントリスナー ---
startButton.addEventListener('click', startTimer);
stopButton.addEventListener('click', stopTimer);
resetButton.addEventListener('click', resetTimer);

// --- 初期化関数の実行 ---
initializeTimer();

// --- スコア計算機能 ---
/**
 * スコアを計算して表示する関数
 * 計算式: 基準定数 / 経過時間(ミリ秒)
 */
function calculateAndDisplayScore() {
    const resultElement = document.getElementById('resultMessage');
    
    // 結果メッセージが存在しない、または「正解」という言葉が含まれていない場合は何もしない
    if (!resultElement || !resultElement.textContent.includes('正解')) {
        return;
    }

    const timeMs = timerState.elapsedTime;

    // 0ミリ秒（エラー等）の場合は計算しない
    if (timeMs <= 0) return;

    // --- スコア設定 ---
    const MAX_SCORE = 10000; // 上限点
    const MIN_SCORE = 1;     // 下限点
    
    // 何分で最低点になるか設定
    // この時間を過ぎるとずっと1点になります
    const TIME_LIMIT_MINUTES = 15; 
    const TIME_LIMIT_MS = TIME_LIMIT_MINUTES * 60 * 1000;

    // 減点計算
    // 経過時間がリミットに対してどれくらいの割合かを計算し、Maxから引く
    // スコア = 上限点 - (上限点 * (経過時間 / リミット時間))
    let score = Math.floor(MAX_SCORE - (MAX_SCORE * (timeMs / TIME_LIMIT_MS)));

    // 上限・下限の適用
    if (score > MAX_SCORE) score = MAX_SCORE;
    if (score < MIN_SCORE) score = MIN_SCORE;

    // --- 画面への表示追加 ---
    
    // スコア表示用の要素を作成
    const scoreDiv = document.createElement('div');
    scoreDiv.style.marginTop = '20px';
    scoreDiv.style.padding = '15px';
    scoreDiv.style.border = '2px solid #198754'; // Bootstrapのsuccessカラー
    scoreDiv.style.borderRadius = '10px';
    scoreDiv.style.backgroundColor = '#f8fff9';
    scoreDiv.style.color = '#198754';

    // 表示内容
    scoreDiv.innerHTML = `
        <h3 style="font-weight: bold;">スコア： ${score.toLocaleString()} ポイント</h3>
        <small>クリアタイム： ${formatTime(timeMs)}</small>
    `;

    // 正解メッセージの下に追加
    resultElement.appendChild(scoreDiv);
}

// ページ読み込み時（initializeTimerで時間が復元された後）に実行
calculateAndDisplayScore();