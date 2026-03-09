# LearningVuln2
This project is secret.<br>
2025/09/06 This repository forked to local repository.<br>

## LearningVulnの使い方
LearningVulnは、xamppを用いて起動するように作成しています。
データベースの作成などを含めて、以下の通り起動してください。

1. バージョン8.2.12のxamppをダウンロードしておきます。

2. xamppインストール後、ファイルマネージャーを開いて、「C:\xampp\htdocs」のフォルダに「LearningVuln2」のフォルダを作成して、本リポジトリの内容全てをコピー＆ペーストします。

3. LearningVuln2のフォルダを開くと「assets」というフォルダの中に「learningvulndb2.sql」というデータベースの情報が保存されたファイルがあります。そちらを利用して、データベースを作成します。

4. コマンドプロンプトなどでmysqlを利用します。rootユーザーでログイン後、「CREATE DATABASE learningvulndb2」とコマンドを入力します。

5. 次に「mysql -u root -p learningvulndb2 < C:\xampp\htdocs\LearningVuln2\assets\learningvulndb2.sql」と入力します。これでデータベースが作成されます。（パスワードを聞かれても、rootユーザーでログインしている場合はそのままEnterキーを入力すれば次に進みます）

6. xamppでApacheとMySQLが起動していることを確認してから、ブラウザを開き、URL入力欄に「http://localhost/LearningVuln2/ctrl/index.php」と入力します。「LearningVulnを始める前に」という画面が表示されていれば、無事に起動できています。