#!/bin/bash

bash /var/www/html/guard/guard.sh

if [ ! -f /var/www/html/guard/granted ]; then
echo Pass Change, Rejected $(date "+%H:%M:%S")>> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/submitReq/usertmp)"
PASSN="$(sed '1!d' /var/www/html/submitReq/passnew)"
#echo Pass change, $USER $(date "+%H:%M:%S") >> /var/www/html/Log18455

SUBM=$(date "+%y.%m.%d")
LAST="$(sed '1!d' /var/www/html/lastPassChange/$USER)"

if [ -z "$PASSN" ]
then
      echo "The password can't be empty" > /var/www/html/errors/error_msg
      echo Pass change, $USER, empty pass, rejected $(date "+%H:%M:%S") >> /var/www/html/Log18455
      exit 0
fi


if [ "$SUBM" == "$LAST" ]
then
#	echo WE ARE HERE FFS $SUBM == $LAST. > /var/www/html/password/WTH
	echo "You can't change your password too frequently" > /var/www/html/errors/error_msg
	echo Pass change, $USER, too frequent, rejected $(date "+%H:%M:%S") >> /var/www/html/Log18455
        exit 0
fi

#echo HERE! >> /var/www/html/password/WTH

echo Pass change, $USER, allowed $(date "+%H:%M:%S") >> /var/www/html/Log18455

cd /var/www/html
cd data*
echo $PASSN > tmp

sed -i '1d' $USER
cat $USER | while read line; do
echo "$line" >> tmp
done

rm $USER
mv tmp $USER
echo $SUBM > /var/www/html/lastPassChange/$USER

rm /var/www/html/submitReq/*
