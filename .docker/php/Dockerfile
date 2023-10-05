FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql

# 必要なパッケージをインストール
RUN apt update && apt install -y \
    git \
    libzip-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*

# PHPの拡張をインストール
RUN docker-php-ext-install pdo_mysql shmop \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# composerを別のイメージからコピー
COPY --from=composer /usr/bin/composer /usr/bin/composer

# 非rootユーザーを作成
RUN groupadd -r phpuser && useradd -r -g phpuser phpuser

# /var/www/html の所有者を phpuser に設定
RUN chown -R phpuser:phpuser /var/www/html

# 作成したユーザーに切り替える
USER phpuser
