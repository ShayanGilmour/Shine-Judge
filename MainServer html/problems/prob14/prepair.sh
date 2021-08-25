#!/bin/bash

#sed '1!d' usertmp > clientData
echo "${PWD##*/}" > /var/www/html/submitReq/prob

bash /var/www/html/guard/guard.sh

if [ ! -f /var/www/html/guard/granted ]; then
echo "${PWD##*/}", Rejected $(date "+%H:%M:%S")>> /var/www/html/Log18455
exit 0
fi

USER="$(sed '1!d' /var/www/html/submitReq/usertmp)"
echo "${PWD##*/}", $USER $(date "+%H:%M:%S") >> /var/www/html/Log18455

rm -r /var/www/html/startup/
mkdir /var/www/html/startup/

cp inpans.zip /var/www/html/startup/
cp /var/www/html/judge.sh /var/www/html/startup/
cp /var/www/html/submitReq/code.py /var/www/html/startup/

if [ -f /var/www/html/problems/"${PWD##*/}"/judge.sh ]; then
	rm /var/www/html/startup/judge.sh
	cp /var/www/html/problems/"${PWD##*/}"/judge.sh /var/www/html/startup/
fi



SUBM=$(date "+%y.%m.%d_%H:%M:%S")

cd /var/www/html/
cd submis*
#cd $USER
cp /var/www/html/submitReq/code.py "$USER/$SUBM"
