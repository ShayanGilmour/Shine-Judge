#!/bin/bash

#sed '1!d' usertmp > clientData
#echo "${PWD##*/}" > /var/www/html/submitReq/prob

bash /var/www/html/guard/guard.sh

if [ ! -f /var/www/html/guard/granted ]; then
echo Project Display, Rejected $(date "+%H:%M:%S")>> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/submitReq/usertmp)"
echo Project Display, $USER $(date "+%H:%M:%S") >> /var/www/html/Log18455

cp /var/www/html/projects/django/tutorial281947 /var/www/html/projects/django/tutorial
