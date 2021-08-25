#!/bin/bash

bash /var/www/html/guard/guard-admin-log.sh

if [ ! -f /var/www/html/guard/granted-admin ]; then
echo see Log, Rejected $(date "+%H:%M:%S") >> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/adminReq/usertmp)"
rm /var/www/html/adminReq/*

echo see Log, $USER $(date "+%H:%M:%S") >> /var/www/html/Log18455

