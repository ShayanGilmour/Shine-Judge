#!/bin/bash

bash /var/www/html/guard/guard-admin-newUser.sh

if [ ! -f /var/www/html/guard/granted-admin ]; then
echo New User, Rejected $(date "+%H:%M:%S") >> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/adminReq/usertmp)"
ID="$(sed '1!d' /var/www/html/newUser/ID)"
rm /var/www/html/adminReq/*

echo Account, $USER, Creating: $ID $(date "+%H:%M:%S") >> /var/www/html/Log18455

