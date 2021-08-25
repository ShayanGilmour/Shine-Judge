
#!/bin/bash

rm /var/www/html/showResult/result
rm /var/www/html/showResult/wrong
rm /var/www/html/showResult/codeAccepted

wget http://ExecuterIP/result
wget http://ExecuterIP/wrong
wget http://ExecuterIP/codeAccepted

#rm -r /var/www/html/startup &> Lop
