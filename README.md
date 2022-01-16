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
git clone https://github.com/acacia8628/resepj.git

cd resepj

composer update

.env.example => .env その後.envファイル内編集

php artisan key:generate

php artisan migrate

php artisan db:seed
```

## 環境

Composer version 2.1.9

PHP 7.4.25

## 文責

* 作成者: acacia8628

## ライセンス

"resepj" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).
