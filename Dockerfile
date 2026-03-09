# ベースにするイメージ
FROM php:8.2-apache

# mysqli 拡張モジュールをインストールして有効化する
RUN docker-php-ext-install mysqli