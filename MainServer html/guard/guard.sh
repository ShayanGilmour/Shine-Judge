#!/bin/bash
#mkdir /var/www/html/guard/RAN
rm /var/www/html/guard/granted
USER="$(sed '1!d' /var/www/html/submitReq/usertmp)"
PASS="$(sed '1!d' /var/www/html/data*/$USER)"
ENTE="$(sed '1!d' /var/www/html/submitReq/passtmp)" #Entered pass

if [[ $USER = *" "* ]]; then
	rm /var/www/html/submitReq/*
  exit 0
fi

if [ -z "$USER" ]
then
	rm /var/www/html/submitReq/*
      exit 0
fi
if [ -z "$PASS" ]
then
	rm /var/www/html/submitReq/*
      exit 0
fi
if [ -z "$ENTE" ]
then
	rm /var/www/html/submitReq/*
      exit 0
fi

if [ $PASS == $ENTE ]; then
	echo 1 >> /var/www/html/guard/granted
	rm /var/www/html/submitReq/passtmp
	exit 0
fi
rm /var/www/html/submitReq/passtmp
rm /var/www/html/submitReq/*
