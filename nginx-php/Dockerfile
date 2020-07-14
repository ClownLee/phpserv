FROM php:fpm-alpine3.12
RUN  sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
  && apk update \
  && apk add --update --no-cache build-base autoconf \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libmcrypt-dev \
    libzip-dev \
    libxml2 libxml2-dev \
    libxslt libxslt-dev zlib-dev zlib \
    nginx \
    #git \
    #nodejs \
  && pecl install mcrypt mongodb swoole redis \
  && docker-php-ext-enable mcrypt mongodb swoole redis \
  # 安装 gd 扩展
  && docker-php-ext-configure gd \
  && docker-php-ext-install -j$(nproc) gd \
  # 安装 sockets 扩展
  && docker-php-ext-configure sockets \
  && docker-php-ext-install -j$(nproc) sockets \
  # 安装 bcmath 扩展
  && docker-php-ext-configure bcmath \
  && docker-php-ext-install -j$(nproc) bcmath \
  # 安装 soap 扩展
  && docker-php-ext-configure soap \
  && docker-php-ext-install -j$(nproc) soap \
  # 安装 pdo_mysql 扩展
  && docker-php-ext-configure pdo_mysql \
  && docker-php-ext-install -j$(nproc) pdo_mysql \
  # 安装 xsl 扩展
  && docker-php-ext-configure xsl \
  && docker-php-ext-install -j$(nproc) xsl \
  # 安装 zip 扩展
  && docker-php-ext-configure zip \
  && docker-php-ext-install -j$(nproc) zip \
  && cp -r /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
  && sed -i 's/;date.timezone =/date.timezone=Asia\/Shanghai/g' /usr/local/etc/php/php.ini
COPY ./init/pro.conf /etc/nginx/conf.d/pro.conf
COPY ./init/composer.phar /usr/local/bin/composer
#COPY ../pro /www
RUN chmod -R 0777 /usr/local/bin/composer \
  && php /usr/local/bin/composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ \
  && mkdir /run/nginx
EXPOSE 443
EXPOSE 80
CMD php-fpm -R -D && nginx -g "daemon off;"