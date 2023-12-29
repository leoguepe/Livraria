#!/bin/bash

livrariaServerName='prova.leonardoguedes.com'
livrariaServerAlias='prova.leonardoguedes.com'

cat <<EOF > /etc/httpd/conf/livraria.conf
<VirtualHost *:80>
    ServerName $livrariaServerName
    ServerAlias $livrariaServerAlias
    DocumentRoot "/var/www/html/livraria/public"
    <Directory "/var/www/html/livraria/public/">
            AllowOverride All
            RewriteEngine On
            RewriteBase /
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule .* index.php/\$0 [L]
    </Directory>
    LogLevel warn
    ErrorLog logs/Livraria.error_log
    CustomLog logs/Livraria.access_log combined
</VirtualHost>
EOF

if ! grep -s livraria.conf /etc/httpd/conf/httpd.conf 2>&1 > /dev/null; then
 echo 'Include /etc/httpd/conf/livraria.conf' | tee -a /etc/httpd/conf/httpd.conf
fi
