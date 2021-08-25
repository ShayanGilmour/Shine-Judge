#!/bin/bash

#sed '1!d' usertmp > clientData

PROB="$(sed '1!d' /var/www/html/edit/content/prob)"

mkdir /var/www/html/problems/$PROB
cp -r /var/www/html/edit/content /var/www/html/problems/$PROB/

cp /var/www/html/edit/main_index.php /var/www/html/problems/$PROB/index.php
cp /var/www/html/edit/main_tofile.php /var/www/html/problems/$PROB/tofile.php
cp /var/www/html/edit/main_prepair.sh /var/www/html/problems/$PROB/prepair.sh
