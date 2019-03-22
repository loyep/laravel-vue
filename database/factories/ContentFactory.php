<?php

use App\Models\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'html'     => $faker->randomHtml(3, 4),
        'is_html'  => true,
        'markdown' => '## 环境版本

```shell
Ubuntu 16.04
Nginx 1.15.5
PHP 7.3.0
MySQL 5.7
Composer 1.7.2
Git 2.7.4
```

## 安装 Nginx

首先，添加 `nginx_signing.key`

```shell
$ wget http://nginx.org/keys/nginx_signing.key

$ wget http://nginx.org/keys/nginx_signing.key
```

添加 Nginx 官方源

```shell
$ echo "deb http://nginx.org/packages/ubuntu/ trusty nginx" >> /etc/apt/sources.list

$ echo "deb http://nginx.org/packages/ubuntu/ trusty nginx" >> /etc/apt/sources.list
```

如果你想安装Nginx1.9以上的版本可以在`packages`后添加`/mainline`，这是主线版本

```shell
$ echo "deb http://nginx.org/packages/mainline/ubuntu/ trusty nginx" >> /etc/apt/sources.list

$ echo "deb-src http://nginx.org/packages/mainline/ubuntu/ trusty nginx" >> /etc/apt/sources.list
```

更新源并安装 Nginx

```shell
$ sudo apt-get update

$ sudo apt-get install nginx

// 开启 nginx
$ /usr/sbin/nginx
```

#### Nginx配置

在 `/etc/nginx/nginx.conf` 文件中的第一行查看你的 [Nginx](http://nginx.org/) 用户。

```shell
$ less /etc/nginx/nginx.conf
```

**修改用户和组**

[PHP7](http://php.net/) 默认的用户和组是`www-data`。 如果你的 [Nginx](http://nginx.org/) 用户名也是`www-data`，那么不需要做下面的修改。 如果你的 [Nginx](http://nginx.org/) 用户名是 nginx，那么你可以在/etc/nginx/nginx.conf文件中将它修改成`www-data`.

```shell
$ sudo vi /etc/nginx/nginx.conf
```

重启 [Nginx](http://nginx.org/) 服务

```shell
$ nginx -s reload
```

**Laravel 项目 Nginx 配置**

在 `/etc/nginx/conf.d` 添加一个新的配置即可，配置如下

```
server {
    listen 80;
    server_name {domain_name};

    charset utf-8;

    access_log  /var/log/nginx/{name}.access.log  main;
    error_log  /var/log/nginx/{name}.error.log warn;

    root   /var/www/{project_name}/public;
    index  index.php index.html index.htm;

    gzip on;
    gzip_min_length 1k;
    gzip_buffers 4 16k;
    gzip_http_version 1.0;
    gzip_comp_level 6;
    gzip_types text/plain application/javascript application/x-javascript text/xml text/css;
    gzip_disable "MSIE [1-6]\.";
    gzip_vary on;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/run/php/php7.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;

        fastcgi_param HTTP_X_FORWARDED_FOR &#039;&#039;;
        fastcgi_param HTTP_X_REAL_IP &#039;&#039;;
        fastcgi_param HTTP_CLIENT_IP &#039;&#039;;
        fastcgi_param HTTP_PROXY &#039;&#039;;
        include fastcgi_params;
    }
}
```

> {domain_name} - 替换成域名
> {name} - 保存的日志名
> {project_name} - 项目名字
> root 是项目存放的地址，这个根据自己实际情况修改

配置好后重启 Nginx 服务

```shell
$ nginx -s reload
```

### 安装 PHP

添加 PPA

```shell
$ sudo apt-get install python-software-properties software-properties-common

$ sudo add-apt-repository ppa:ondrej/php

$ sudo apt-get update
```

安装 [PHP7](http://php.net/) 以及所需的一些扩展

```shell
$ sudo apt-get install php7.3-fpm php7.3-mysql php7.3-common php7.3-curl php7.3-cli php7.3-mbstring php7.3-xml php7.3-bcmath
```

配置 [PHP7](http://php.net/)

```shell
$ sudo vim /etc/php/7.3/fpm/php.ini
```

找到`cgi.fix_pathinfo`选项，去掉注释，然后将值设置为`0`

```ini
cgi.fix_pathinfo=0
```

重启 [PHP7](http://php.net/)

```shell
$ sudo service php7.3-fpm restart
```

### 安装MySQL

```shell
$ sudo apt-get install mysql-server-5.7 mysql-client-5.7
```

途中会提示设置MySQL的密码，安装后运行：

```shell
$ mysql -uroot -p
```

### 安装 Git

```shell
$ sudo apt-get git
```

### 安装 Composer

```shell
$ php -r "copy(&#039;https://getcomposer.org/installer&#039;, &#039;composer-setup.php&#039;);"

$ php -r "if (hash_file(&#039;SHA384&#039;, &#039;composer-setup.php&#039;) === &#039;93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8&#039;) { echo &#039;Installer verified&#039;; } else { echo &#039;Installer corrupt&#039;; unlink(&#039;composer-setup.php&#039;); } echo PHP_EOL;"

$ php composer-setup.php

$ php -r "unlink(&#039;composer-setup.php&#039;);"

$ sudo mv composer.phar /usr/bin/composer
```

### 安装 Certbot

```shell
$ sudo apt-get update

$ sudo apt-get install software-properties-common

$ sudo add-apt-repository ppa:certbot/certbot

$ sudo apt-get update

$ sudo apt-get install python-certbot-nginx 
```

给项目设置证书，此命令会自动设置 nginx 配置，无需手动设置。

```shell
$ sudo certbot --nginx
```

### 设置部署公钥

为了方便部署等，这一步必须要设置，首先生成 `ssh-key`

```shell
$ ssh-keygen -t rsa -b 4096
```

将对应的公钥复制，并在对应的项目仓库部署公钥处设置读权限

```shell
$ cat ~/.ssh/id_rsa.pub
```

### 安装 Redis

```shell
$ sudo apt-get install redis-server
```

使用

```shell
$ redis-cli
```


### 安装项目

下载项目

```shell
$ cd /var/www

$ git clone git@....
```

设置项目访问权限

```shell
$ chown -R www-data:www-data {project_directory}
```

> 切忌：不要将项目权限设置为 **777**，项目权限只能设置为 **755**

安装项目依赖

```shell
$ composer install -vvv
```

设置项目配置

```shell
$ cp .env.example .env
```',
    ];
});
