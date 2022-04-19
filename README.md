# webpconv
## 機能
 phpを利用して、jpg,png形式のファイルをもとに、webp形式のファイルを作成するツール。
## 使い方
 php webconv.php filename.jpg
 上記の指定にて filename.jpg.webp ファイルが作成される。
## 動作環境
 php7.4 gd --with-webp
 
 dockerでの動作は次のDockerfileにて動作確認済。

## Dockerfile
<pre>
FROM php:7.4-apache

RUN apt-get update &&\
  # WebP 対応
  apt-get install -y zlib1g-dev libjpeg-dev libpng-dev libwebp-dev &&\
  docker-php-ext-configure gd --with-jpeg --with-webp &&\
  docker-php-ext-install -j$(nproc) gd
</pre>

以下を参考にさせていただきました。

[Docker 公式 PHP 7.4 イメージで GD ライブラリをインストールする方法](https://tt-computing.com/docker-php-gd#webp)
