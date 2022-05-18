# coffe KONECTA - Laravel
Repositorio de prueba tecnica Konecta

KONECTA necesita para unas de sus cafeterías que tiene en sede de un software, que permita almacenar y gestionar el inventario de sus productos. Este software debe permitir la creación de productos, la edición de los productos, la eliminación de productos y listar todos los productos registrados en el sistema.

los pasos para desplegar la aplicación en un servidor linux - CentOS son los siguientes:

Descargar los repositorios de MySQL.
1 - sudo wget https://dev.mysql.com/get/mysql80-community-release-el7-3.noarch.rpm

Preparar el repositorio para que luego pueda instalar paquetes MySQL desde él:
2 - sudo rpm -Uvh mysql80-community-release-el7-3.noarch.rpm
3 - sudo yum install mysql-server
Conocer la pass temporal para el root
4 - sudo grep 'password' /var/log/mysqld.log ----> sfsh3xo2fi#V
5 - sudo mysql_secure_installation

Instalar PHP
1 - sudo yum -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
2 - sudo yum -y install https://rpms.remirepo.net/enterprise/remi-release-7.rpm
6 - sudo yum -y install yum-utils
7 - sudo yum-config-manager --enable remi-php74
8 - sudo yum update
9 - sudo yum install php php-cli
9 - sudo yum install php  php-cli php-fpm php-mysqlnd php-zip php-devel php-gd php-mcrypt php-mbstring php-curl php-xml php-pear php-bcmath php-json

Instalar Composer (https://comoinstalar.me/como-instalar-composer-en-centos-7/)
10 - sudo yum install -y curl unzip
11 - curl -sS https://getcomposer.org/installer | php
12 - sudo mv composer.phar /usr/local/bin/composer

Instalar laravel
13 - composer global require "laravel/installer"
14 - export PATH=$PATH:$HOME/.config/composer/vendor/bin
15 - source /etc/profile

Luego de seguir estos pasos se debe crear la base de datos en MySQL, clonar el repositorio GIT y ejecutar un composer update para instalar las librerías

CONSULTA SQL PARA CONOCER CUAL ES EL PRODUCTO QUE MAS STOCK TIENE - SELECT name FROM products WHERE stock = (SELECT MAX(STOCK) FROM products);
