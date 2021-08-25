#!/bin/bash
echo "ID:"
ID="$(sed '1!d' /var/www/html/newUser/ID)"
echo "NAME:"
NAME="$(sed '1!d' /var/www/html/newUser/name)"
echo "FAMILY:"
FAMILY="$(sed '1!d' /var/www/html/newUser/family)"

cd /var/www/html/
cd data-*
echo $NAME > $ID
echo $NAME $FAMILY >> $ID
chmod 755 $ID
cd ..
cd submis*
mkdir $ID
chmod 777 $ID
cd ..
cd acce*
mkdir $ID
chmod 777 $ID
