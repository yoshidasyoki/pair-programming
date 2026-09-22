# ペアプロ用

## 概要
チーム開発の一部機能をペアプロする。

## 環境構築方法
以下手順に沿って操作を行うこと

### ① ソースコードのクローン
任意のディレクトリを作成＆その直下に移動したのち、
```bash
git clone https://github.com/yoshidasyoki/pair-programming.git .
```
を実行する。その後以下コマンドを実行して`compose.yml`があればOK。
```bash
ls
```
↓ 実行結果
```bash
compose.yml  docker  docs  src
```

### ② Docker構築
以下コマンドを順に実行すること
```bash
docker compose up -d
```
コンテナが立ち上がればOK。以下コマンドで`web`と`db`コンテナが立ち上がっているかも確認する。
```bash
docker compose ps
```

### ③ テーブル初期設定
以下コマンドを順に実行してテーブルを作成する
```bash
docker compose exec web bash
```

```bash
php database/create.php
```
※ 「テーブルを作成しました」とメッセージが出ればOK。

> [!WARNING]
> テーブルを作成できない場合は以下の操作を実施してDocker構築から再度行う
> ```bash
> docker compose down -v
> ```
> ```bash
> docker coompose build && docker compose up -d
> ```
> これで正常に処理ができれば後は「③ テーブル初期設定」の手順を再度行う

### ④ セットアップ確認
ここまでの操作でセットアップ作業は完了なので正常に動作するか確認する。
以下URLにアクセスしてタグ作成ページが出ればOK。
```
localhost:8080/v2/tags/create
```
<img width="309" height="143" alt="image" src="https://github.com/user-attachments/assets/f2a990d1-a8ee-4bbb-9511-c85d8d805b9e" />
