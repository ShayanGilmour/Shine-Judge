#!/bin/bash

bash /var/www/html/guard/guard-admin-questions.sh

if [ ! -f /var/www/html/guard/granted-admin ]; then
echo Edit, Rejected $(date "+%H:%M:%S") >> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/adminReq/usertmp)"
PROB="$(sed '1!d' /var/www/html/edit/content/prob)"
rm /var/www/html/adminReq/*

echo Edit, $USER, $PROB $(date "+%H:%M:%S") >> /var/www/html/Log18455

