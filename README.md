# PHP Dockerfile
Dockerfile for php & nginx. php 容器 和 nginx 容器，php-fpm 处理PHP代码，nginx 处理纯前端和静态资源，实现前后端分离。 php 容器中 安装有（bcmath, Core, ctype, curl, date, dom, fileinfo, filter, ftp, gd, hash, iconv, json, libxml, mbstring, mcrypt, mongodb, mysqlnd, openssl, pcre, PDO, pdo_mysql, pdo_sqlite, Phar, posix, readline, redis, Reflection, session, SimpleXML, soap, sockets, sodium, SPL, sqlite3, standard, swoole, tokenizer, xml, xmlreader, xmlwriter, xsl, zip, zlib）等常用扩展。
## 目录结构
![avatar](http://chuantu.xyz/t6/739/1594795366x992249049.png)
### Project 1:
- 直接 build Dockerfile 创建 nginx 和 php 在一个容器里。
- nginx 默认配置文件 `/phpserv/nginx-php/init/pro.conf` 
- web 项目目录为容器内的 `/www/pro/public` 目录下(基于 laravel 和 thinkphp 框架入口目录设计)
### Project 2:
- 直接运行 ./start 脚本
- 分别创建两个镜像同时生成并 run 两个容器 change-nginx 和 change-php 实现两容器关联
- change-nginx 容器的 web 项目目录 `/www/pro/public`（web 项目目录 可在 `/phpserv/two-containers/nginx1.16.0/init/pro.conf` 配置文件中修改） 用于部署静态资源纯前端代码等
- change-php 容器的 web 项目目录 `/www/pro/public`（web 项目目录 可在 `/phpserv/two-containers/nginx1.16.0/init/pro.conf` 配置文件中修改） 基于 laravel 和 thinkphp 框架入口目录设计
- 前后端项目代码自动挂载 `./start` 中修改（默认测试项目代码： `/phpserv/two-containers/pro`）