#!/bin/bash

s3baseUrl='s3://livrariadeploy/livraria/'S

rm -rf /var/www/html/livraria_old

mv /var/www/html/livraria /var/www/html/livraria_old

mv /var/www/html/livraria_new /var/www/html/livraria

aws s3 cp ${s3baseUrl}.env /var/www/html/livraria/.env
