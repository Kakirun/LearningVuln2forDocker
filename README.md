# LearningVuln2forDocker
2026/03/09 This repository is made<br>

## LearningVulnの使い方
LearningVulnのDocker版です。
Dockerの基本的な環境構築は行われている前程で、以下の操作を行ってください。

1. 任意のディレクトリにGitHubからコードをダウンロード（クローン）する
gitの環境が構築されていない場合はGitHub上からソースコードのファイルをダウンロードしても構いません。

git clone https://github.com/Kakirun/LearningVuln2forDocker.git

2. ダウンロードしたディレクトリに移動し、Dockerを起動する
ターミナル（コマンドプロンプト）で以下のコマンドを実行します。
docker-compose up -d

3. ブラウザでアクセスする
http://localhost:8080/ctrl/ にアクセスすれば、アプリケーションが利用できます。

4. コンテンツを終了する
簡易的な終了（コンテンツを再度使用する予定がある場合）
docker-compose down
データベースとイメージの削除も含めた終了
docker-compose down -v --rmi all