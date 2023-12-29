#!/bin/bash

if [ "$environmentName" == "production" ] || [ "$environmentName" == "development" ]; then
    echo true
else
    environmentName=$(curl -s http://169.254.169.254/latest/user-data | grep 'environment=' | cut -d '=' -f 2)
    role=$(curl -s http://169.254.169.254/latest/user-data | grep 'role=' | cut -d '=' -f 2)
fi

if [ "$environmentName" == "production" ]; then
    livrariaServerName='prova.leonardoguedes.com'
    livrariaServerAlias='prova.leonardoguedes.com'
else
    livrariaServerName='prova-dev.leonardoguedes.com'
    livrariaServerAlias='prova-dev.leonardoguedes.com'
fi

cat <<EOF > /etc/httpd/conf/livraria.conf
<VirtualHost *:80>
        ServerName $livrariaServerName
        ServerAlias $livrariaServerAlias
        DocumentRoot "/var/www/html/Livraria/public"
        <Directory "/var/www/html/Livraria/public/">
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
