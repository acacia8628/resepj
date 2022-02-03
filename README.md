<p align="center">
<img src="/public/image/rese-logo.png" height="80px">
</p>

# 飲食店予約サービスアプリ「RESE」のコード（PHP）

ある企業のグループ会社の飲食店予約サービスです。

会員登録からお店のお気に入り、予約まで行えます。

## デモ

飲食店一覧から気になったお店の詳細を見ることができ、お店の予約をとることができます。

![飲食店一覧](/public/image/demo-home.png)
![予約](/public/image/demo-reserve.png)

## 使い方

```
git clone https://github.com/ucan-lab/docker-laravel.git

git clone https://github.com/acacia8628/resepj.git

cd docker-laravel/backend

composer update

make init

.env.example => .env その後.envファイル内編集

make app

php artisan key:generate

php artisan storage:link
```

## 注意点

* デフォルトシーダーは次の３つです。「ReserveTableSeeder」と「ReviewTableSeeder」を使用したい場合、ユーザーを１人作成後にデフォルトシーダーをコメントアウトしてから使用してください。

```
・GenreTableSeeder

・AreaTableSeeder

・ShopTableSeeder
```

* Gateで権限分けをしています。詳細は「routes/web.php」「app/Providers/AuthServiceProvider.php」を確認してください。

```
・管理者(role=1) -> 新規店舗、新規店舗代表者の作成

・店舗代表者(role=3) -> 担当店舗の情報更新、予約者へのメール送信

・ユーザー(role=5) -> 予約、お気に入り、マイページの使用など

・ゲスト -> 店舗一覧、詳細、新規ユーザーの作成
```

* メール送信機能を実装しています。以下のディレクトリにて編集できます。

```
・app/Console/Commands/SendMailToReserveUser.php

・app/Console/Kernel.php

・app/Mail/ディレクトリ一覧

・resources/views/emails/ディレクトリ一覧
```

## 環境

git version 2.32.0

Docker version 20.10.12

Docker Compose version v2.2.3

## 文責

作成者: acacia8628

## ライセンス

"resepj" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).
