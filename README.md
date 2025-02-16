# アプリケーション名

確認テスト用アプリケーション

## 環境構築

Dockerビルド
git clone git@github.com:tamtakatam/confirmation.git
docker-compose up -d -build

laravelビルド
docker-compose exec php bash
composer install
.env.exampleから.envを作成し、環境変数を変更
- DB_HOST=127.0.0.1
+ DB_HOST=mysql　　※接続先をローカルホストにする

- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=
+ DB_DATABASE=laravel_db　　※接続先をlaravelのdbにする
+ DB_USERNAME=laravel_user　※接続先をlaravelのdbにする
+ DB_PASSWORD=laravel_pass　※接続先をlaravelのdbにする

php artisan key:generate
php artisan migrate


## 使用技術(実行環境)

php:7.4.9
laravel:8.83.8
mysql:15.1

## ER 図

< - - - 作成した ER 図の画像 - - - >

## URL

開発環境：http://localhost/
phpMyAdmin: http://localhost:8080/
