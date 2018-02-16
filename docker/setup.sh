#!/usr/bin/env bash
set -e
export DEBIAN_FRONTEND=noninteractive

# Install nginx, php, mariadb, nodejs
apt-get update -y
apt-get install -y --no-install-recommends apt-utils curl nano

echo "Installing additional libs..."
echo "deb http://packages.dotdeb.org jessie all" | tee /etc/apt/sources.list.d/dotdeb.list
echo "deb-src http://packages.dotdeb.org jessie all" | tee /etc/apt/sources.list.d/dotdeb-src.list
curl -sSkL https://www.dotdeb.org/dotdeb.gpg -o dotdeb.gpg
apt-key add dotdeb.gpg

echo "Installing packages..."
apt-get update -y
apt-get install -y --no-install-recommends unzip supervisor php7.0-fpm php7.0-imagick \
  php7.0-curl php7.0-mysql php7.0-mcrypt php7.0-xml php7.0-memcached php7.0-mbstring \
  nginx mariadb-server build-essential sqlite3 libsqlite3-dev git ruby ruby-dev

echo "Install mailcatcher..."
gem install mailcatcher
sed -i 's/.*sendmail_path.*/sendmail_path = \/usr\/bin\/env catchmail -f admin@gdpr-compliance\.test/g' /etc/php/7.0/fpm/php.ini
sed -i 's/.*sendmail_path.*/sendmail_path = \/usr\/bin\/env catchmail -f admin@gdpr-compliance\.text/g' /etc/php/7.0/cli/php.ini

echo "Installing wordpress..."
curl -sSkL https://wordpress.org/latest.tar.gz | tar -xzvC /var/www

echo "Installing wp-cli..."
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/local/bin/wp
alias wp="wp --allow-root"

echo "Installing composer..."
curl -sSkL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

echo "Setting up database..."
service mysql start
mysql -e "CREATE DATABASE gdpr;"
mysql -e "GRANT ALL PRIVILEGES ON gdpr.* TO gdpr@localhost IDENTIFIED BY 'gdpr';"
echo "Database created, importing all .sql files..."
cat docker/*.sql | mysql gdpr
apt-get install -y phpmyadmin
service mysql stop
ln -s /usr/share/phpmyadmin /var/www/wordpress/

mkdir -p /var/log/supervisor

echo "Setting up configs..."
mv docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
mv docker/nginx.conf /etc/nginx/conf.d/nginx.conf
mv docker/wp-config.php /var/www/wordpress/wp-config.php

echo "Cleaning up..."
rm -rf docker
apt-get autoremove -y
