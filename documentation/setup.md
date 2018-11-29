# Archive Tool setup

This document describes how to set up Archive Tool in Ubuntu 18.04.

## Server locations

| Name                                     | Path                                          | Description                                                                                          | Permissions                                                  |
| ---------------------------------------- | --------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ------------------------------------------------------------ |
| `apacheDocuments`                        | `/var/www/html`                               | Document root of the Apache server                                                                   | Deployment/FTP: Read, write, ?                               |
| `publicAccess`                           | ?                                             | Location of uploaded files                                                                           | Public/FTP: Read, write, create directory, Cron: Read, write |
| `fileStore` (`filestore`, `fileStorage`) | ?                                             | Virtual directory mapped to network share where AT and RS will look for video files after processing | Developer/FTP: ?, Cron: Read, write                          |
| `tempStorage`                            | ?                                             | Where FFMPEG stores its temporary files                                                              | Cron: Read, write, FFMPEG: Read, write                       |
| `runtimeStorage`                         | `var/www/html/assets`, `var/www/html/runtime` | Temporary storage used by the Apache and PHP cron job                                                | Apache: Read, write, create directory - Cron: Read, write    |

Directories set by the deployment server – ???
/resourcespace
/filestore

Directories set by the ResourceSpace setup - ???

## Cron

- Pipeline
  - Process files (how?)
  - Move files (to where?)
  - Recompress videos using FFMPEG
- Run PHP-scripts (which?)

## Setup Ubuntu locally using WSL

This section describes how to setup:

- Ubuntu 18.04 server
  - LAMP stack
  - FTP server
  - Cron
  - FFMPEG
  - SSH access

### Install LAMP stack

Following steps are based on

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

(The following is based on https://askubuntu.com/questions/761713/how-can-i-downgrade-from-php-7-to-php-5-6-on-ubuntu-16-04)

    sudo apt install php5.6 php5.6-mysql libapache2-mod-php5.6
    sudo a2enmod php5.6
    sudo update-alternatives --set php /usr/bin/php5.6

##### Move `index.php` to first position

    sudo vim /etc/apache2/mods-enabled/dir.conf

##### Install extensions

    sudo apt install php5.6-curl
    sudo apt install php5.6-gd

##### Make changes to `php.ini`

    sudo vi /etc/php/5.6/apache2/php.ini

| Setting               | Value   |
| --------------------- | ------- |
| `memory_limit`        | `200M`  |
| `post_max_size`       | `100M`  |
| `upload_max_filesize` | `6000M` |

Enable extensions:

- `php_curl.dll`
- `php_gd.dll`

Restart Apache

    sudo service apache2 restart

## Setup Ubuntu on Azure

Same steps as above. Consider using SSH for authentication. Add inbound rule giving your developer machine access to all ports.

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
    exit;

_Existing server_

    sudo mysqldump -u rsvideokunstutf8 -p rsvideokunstutf8 > ~/rsvideokunstutf8.sql

_Locally_

    scp EXISTING_SERVER_ALIAS:rsvideokunstutf8.sql .
    scp rsvideokunstutf8.sql NEW_SERVER_ALIAS:

_New server_

    mysql -u rsvideokunstutf8 rsvideokunstutf8 -p < rsvideokunstutf8.sql

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

## Option 1 – Install locally

Windows file system needs to be mounted with option `metadata` in order to set file and directory permissions within the Windows mount. Add the following to `/etc/wsl.conf` and restart Windows:

    [automount]
    enabled = true
    options = "metadata"
    mountFsTab = false

### Set up directory to be hosted by Apache

    tar -xf public_html_copy.tar
    sudo mv public_html_copy/public_html archive-tool
    sudo chown -R YOUR_WSL_USERNAME:www-data archive-tool
    sudo service apache2 restart

### Edit `/etc/apache2/sites-enabled/000-default.conf`

Set `DocumentRoot` to `"/mnt/c/Users/Alexander Teinum/repos/archive-tool"`.

Add `Directory` directive to allow access to `archive-tool`:

    <Directory "/mnt/c/Users/Alexander Teinum/repos/archive-tool">
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
    </Directory>

## Option 2 – Install at new server

    sudo mv public_html_copy.tar /var/www
    cd /var/www
    sudo tar -xf public_html_copy.tar
    sudo mv public_html_copy/public_html archive-tool
    sudo chown -R www-data: archive-tool

### Edit `/etc/apache2/sites-enabled/000-default.conf`

Set `DocumentRoot` to `/var/www/archive-tool`.
