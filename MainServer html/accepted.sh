#!/bin/bash
#If the last code was accepted, it copys it to the user's accepted codes.
USER="$(sed '1!d' /var/www/html/submitReq/usertmp)"
PROB="$(sed '1!d' /var/www/html/submitReq/prob)"
SUBM=$(date "+%y.%m.%d_%H:%M:%S")

cd /var/www/html
cd accepted*
cp /var/www/html/submitReq/code.py "$USER/$PROB $SUBM"
cp /var/www/html/submitReq/code.cpp "$USER/$PROB $SUBM"
cd /var/www/html/Accepted
cd $USER*
cp /var/www/html/submitReq/code.py "$PROB $SUBM"
cp /var/www/html/submitReq/code.cpp "$PROB $SUBM"
