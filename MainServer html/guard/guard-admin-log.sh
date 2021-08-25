#!/bin/bash
#mkdir /var/www/html/guard/RAN

rm /var/www/html/guard/granted-admin
USER="$(sed '1!d' /var/www/html/adminReq/usertmp)"
PASS="$(sed '1!d' /var/www/html/data*/$USER)"
ENTE="$(sed '1!d' /var/www/html/adminReq/passtmp)" #Entered pass
ACCE="$(sed '5!d' /var/www/html/data*/$USER)" #Does have access?
#echo $USER, $PASS, $ENTE >> /var/www/html/guard/WTH
if [ -z "$USER" ]
then
	rm /var/www/html/adminReq/passtmp
      exit 0
fi
if [ -z "$PASS" ]
then
	rm /var/www/html/adminReq/passtmp
      exit 0
fi
if [ -z "$ENTE" ]
then
	rm /var/www/html/adminReq/passtmp
      exit 0
fi

if [ -z "$ACCE" ]
then
	rm /var/www/html/adminReq/passtmp
      exit 0
fi

if [ $ACCE != "admin-log" ]; then
        rm /var/www/html/adminReq/passtmp
        exit 0
fi


if [ $PASS == $ENTE ]; then
	echo 1 >> /var/www/html/guard/granted-admin
	rm /var/www/html/adminReq/passtmp
	exit 0
fi
rm /var/www/html/adminReq/passtmp
