#!/bin/bash
USER="$(sed '1!d' /var/www/html/submitReq/usertmp)"
PASS="$(sed '1!d' /var/www/html/submitReq/passtmp)"

bash /var/www/html/guard/guard.sh

if [ ! -f /var/www/html/guard/granted ]; then
echo Accepted Codes, Rejected $(date "+%H:%M:%S")>> /var/www/html/Log18455
exit 0
fi

echo Accepted Codes, $USER $(date "+%H:%M:%S") >> /var/www/html/Log18455

exit 0
#Later, i changed the system to see the accepted codes
#So, it doesn't need the rest

cd /var/www/html/Accepted/
rm -r $USER*
#mkdir "/var/www/html/Accepted/$USER$PASS/"

cd /var/www/html/
cd accep*

#cd $USER

#for filename in *; do
#    $filename= $($filename | cut -f1 -d" ")
#    tmp=${filename% *}
#    echo $filename tooo $tmp >> /var/www/html/Accepted/wth
#    cp $filename "/var/www/html/Accepted/$USER$PASS/" &> /var/www/html/Accepted/WTH
#done

cp -r "$USER" "/var/www/html/Accepted/$USER$PASS/" #&> /var/www/html/Accepted/wth

rm /var/www/html/submitReq/*

