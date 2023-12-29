#!/bin/bash

if [ $environmentName == "production" || $environmentName == "development" ]; then
    echo true
else
    environmentName=`curl -s http://169.254.169.254/latest/user-data | grep 'environment=' | cut -d '=' -f 2`
    role=`curl -s http://169.254.169.254/latest/user-data | grep 'role=' | cut -d '=' -f 2`
fi


if [ $environmentName == "production" ]; then

	s3baseUrl='s3://livrariadeploy/livraria/'
else
	s3baseUrl='s3://livrariadeploy/livraria/dev/'
fi

rm -rf /var/www/html/livraria_old

mv /var/www/html/livraria /var/www/html/livraria_old

mv /var/www/html/livraria_new /var/www/html/livraria

aws s3 cp ${s3baseUrl}.env /var/www/html/livraria/.env
