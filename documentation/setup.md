# Archive Tool setup

This document describes how to set up Archive Tool in Ubuntu 18.04.

## Setup Ubuntu

This section describes how to setup:

- Ubuntu 18.04 server
  - LAMP stack
  - FTP server
  - Cron
  - FFMPEG
  - SSH access

For Ubuntu on Azure; consider using SSH for authentication. Add inbound rule giving your developer machine access to all ports.

### Install LAMP stack

The following is based on:

- https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04
- https://www.digitalocean.com/community/tutorials/how-to-rewrite-urls-with-mod_rewrite-for-apache-on-ubuntu-18-04

#### Apache

    sudo apt update

    sudo apt install apache2
    sudo ufw app list
    sudo ufw app info "Apache Full"
    sudo a2enmod rewrite
    sudo service apache2 start

#### MySQL

    sudo apt install mysql-server
    sudo service mysql start
    sudo mysql_secure_installation

#### PHP 5.6

PHP 7.2 is the latest version (when this was written). However, Archive Tool and its dependencies needs to be migrated before we can use it.

The following is based on https://askubuntu.com/questions/761713/how-can-i-downgrade-from-php-7-to-php-5-6-on-ubuntu-16-04

    sudo add-apt-repository ppa:ondrej/php
    sudo apt install php5.6 php5.6-mysql libapache2-mod-php5.6 php5.6-mbstring
    sudo update-alternatives --set php /usr/bin/php5.6

##### Move `index.php` to first position

    sudo vim /etc/apache2/mods-enabled/dir.conf

##### Install extensions

    sudo apt install php5.6-curl
    sudo apt install php5.6-gd

##### Use `php.ini-development` (local development only)

    sudo cp /etc/php/5.6/apache2/php.ini /etc/php/5.6/apache2/php.ini.orig
    sudo cp /usr/lib/php/5.6/php.ini-development /etc/php/5.6/apache2/php.ini

##### Use `php.ini-production` (production only)

    sudo cp /etc/php/5.6/apache2/php.ini /etc/php/5.6/apache2/php.ini.orig
    sudo cp /usr/lib/php/5.6/php.ini-production /etc/php/5.6/apache2/php.ini

##### Make changes to `php.ini`

    sudo vi /etc/php/5.6/apache2/php.ini

| Setting               | Value   |
| --------------------- | ------- |
| `memory_limit`        | `1024M` |
| `post_max_size`       | `6000M` |
| `upload_max_filesize` | `6000M` |

Enable extensions:

- `php_curl.dll`
- `php_gd2.dll`

Restart Apache

    sudo service apache2 restart

## Set up database

| Description | Value                      |
| ----------- | -------------------------- |
| Host        | `localhost`                |
| Database    | `rsvideokunstutf8`         |
| Charset     | UTF-8                      |
| Username    | `rsvideokunstutf8`         |
| Password    | _Choose a secure password_ |

    sudo mysql

    CREATE DATABASE rsvideokunstutf8 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
    CREATE USER 'rsvideokunstutf8'@'localhost' IDENTIFIED BY '_Choose a secure password_';
    GRANT ALL PRIVILEGES ON rsvideokunstutf8.* TO 'rsvideokunstutf8'@'localhost';

The following are needed by ResourceSpace 7:

    set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
    set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';

    exit;

_Existing server_

    sudo mysqldump -u rsvideokunstutf8 -p rsvideokunstutf8 > ~/rsvideokunstutf8.sql

_Locally_

    scp EXISTING_SERVER_ALIAS:rsvideokunstutf8.sql .
    scp rsvideokunstutf8.sql NEW_SERVER_ALIAS:

_New server_

    mysql -u rsvideokunstutf8 rsvideokunstutf8 -p < rsvideokunstutf8.sql

### Set up ExifTool

    sudo apt install exiftool

## Set up Archive Tool

_Existing server_

    sudo rsync -av --progress /var/www/public_html ~/public_html_copy --exclude temp
    sudo chown -R adminnof: public_html_copy
    find public_html_copy -type f -print0 | xargs -0 chmod 0664
    find public_html_copy -type d -print0 | xargs -0 chmod 0775
    tar -cf public_html_copy.tar public_html_copy

_Locally_

    scp EXISTING_SERVER_ALIAS:public_html_copy.tar .
    scp public_html_copy.tar NEW_SERVER_ALIAS:

### Option 1 – Local development

Windows file system needs to be mounted with option `metadata` in order to set file and directory permissions within the Windows mount. Add the following to `/etc/wsl.conf` and restart Windows:

    [automount]
    enabled = true
    options = "metadata"
    mountFsTab = false

#### Set up directory to be hosted by Apache

    tar -xf public_html_copy.tar
    sudo mv public_html_copy/public_html archive-tool
    sudo chown -R YOUR_WSL_USERNAME:www-data archive-tool
    sudo service apache2 restart

#### Edit Apache configuration

    sudo vi /etc/apache2/sites-enabled/000-default.conf

Set `DocumentRoot` to `"/mnt/c/Users/Alexander Teinum/repos/archive-tool"`.

Add `Directory` directive to allow access to `archive-tool`:

    <Directory "/mnt/c/Users/Alexander Teinum/repos/archive-tool">
        Options FollowSymLinks
        AllowOverride None
        Require all granted
    </Directory>

### Option 2 – Production server

    sudo mv public_html_copy.tar /var/www
    cd /var/www
    sudo tar -xf public_html_copy.tar
    sudo mv public_html_copy/public_html archive-tool
    sudo chown -R www-data: archive-tool

#### Edit Apache configuration

    sudo vi /etc/apache2/sites-enabled/000-default.conf

Set `DocumentRoot` to `/var/www/archive-tool`. Then restart Apache:

    sudo service apache2 restart

### Twig cache permissions

`twig_cache` needs to have `www-data` both as user and group. I encountered an issue relating to this when going to `http://localhost/site/index.php/setup/index`.

    sudo chown -R www-data: archive-tool/site/protected/runtime/twig_cache/

### Web-based setup

http://localhost/site/index.php/setup/index

Change `http://queue.videokunstarkivet.org/site/index.php/job/run/` to `http://localhost/site/index.php/job/run/`

## Set up ResourceSpace

### Option 1 – Development

In `resourcespace7/include/config.php`, set `$baseurl` to `http://localhost/resourcespace7`

#### Set up `filestore` directory

    rm -r resourcespace7/filestore # TODO: We might remove this symbolic link from Git
    mkdir resourcespace7/filestore
    sudo chown -R YOUR_WSL_USERNAME:www-data resourcespace7/filestore

    # TODO: Unsure about permissions for following:

    sudo chmod 775 resourcespace7/filestore

### Option 2 – Production

In `resourcespace7/include/config.php`, set `$baseurl` to `http://NEW_SERVER_URL/resourcespace7`

#### Set up `filestore` directory

    sudo rm -r resourcespace7/filestore # TODO: We might remove this symbolic link from Git

_Make symbolic link from `resourcespace7/filestore` to where files are located._

### Set up `temp` directory

    sudo mkdir site/protected/runtime/temp

    # TODO: Unsure about permissions for following:

    sudo chown -R www-data:www-data site/protected/runtime/temp

### Set up `web-upload` directory

    sudo mkdir web-upload
    sudo chown www-data: web-upload

### Set up `assets` directory

    sudo mkdir site/assets
    sudo chmod 755 site/assets
    sudo chown www-data: site/assets

## Set up transcoding dependencies

### Set up ImageMagick

    sudo apt update
    sudo apt install imagemagick

### Set up FFMPEG

    sudo apt install ffmpeg

## Set up Cron

### Option 1 – Local development

- Run `sudo crontab -e`
- Add the following (without the backtics characters at the beginning and at the end):

  `*/10 * * * * php /mnt/c/Users/YOUR_USERNAME/repos/archive-tool/site/protected/yiic process --wait=1 --silent=1`

`*/10 * * * *` means “At every 10th minute.”

### Option 2 – Production server

- Run `sudo crontab -e`
- Add the following (without the backtics characters at the beginning and at the end):

  `*/10 * * * * php /var/www/archive-tool/site/protected/yiic process --wait=1 --silent=1`

`*/10 * * * *` means “At every 10th minute.”

## Set up FTP

The FTP upload path is set in `site/protected/config/users/setup.json` under `fixedValues.upload_path`.

(Based on https://www.techrepublic.com/article/how-to-quickly-setup-an-ftp-server-on-ubuntu-18-04/)

    sudo apt install vsftpd
    sudo service vsftpd start

    sudo cp /etc/vsftpd.conf /etc/vsftpd.orig

### In `/etc/vsftpd.conf`

    sudo vim /etc/vsftpd.conf

(Based on https://www.digitalocean.com/community/tutorials/how-to-set-up-vsftpd-for-a-user-s-directory-on-ubuntu-18-04)

- Uncomment `write_enable=YES`
- Uncomment `local_umask=022`
- Uncomment `chroot_local_user=YES`
- If setup on production server, an inbound firewall rule might be needed to set up.

### Set up users and directories

sudo useradd -m vka
sudo passwd vka
sudo mkdir /home/vka/ftp-upload
sudo chown vka: /home/vka/ftp-upload
sudo chmod -w /home/vka

## How to start everything after reboot

    sudo mysql
    set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
    set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
