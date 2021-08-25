#!/bin/bash

bash /var/www/html/guard/guard-admin-questions.sh

if [ ! -f /var/www/html/guard/granted-admin ]; then
echo AdminPage, Rejected $(date "+%H:%M:%S") >> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/adminReq/usertmp)"
rm /var/www/html/adminReq/*

echo AdminPage, $USER $(date "+%H:%M:%S") >> /var/www/html/Log18455
