#!/bin/bash
echo "One more" >> Log
echo "work" >> /var/www/html/working

rm /var/www/html/result
rm /var/www/html/wrong
rm /var/www/html/codeAccepted

rm -r place/
mkdir place
cd place


wget http://MainIP/startup/inpans.zip

unzip inpans.zip
cd inpans

wget http://MainIP/startup/code.py
wget http://MainIP/startup/code.cpp
wget http://MainIP/startup/judge.sh

bash judge.sh
cd /var/www/html/
rm -r /var/www/html/place/
rm /var/www/html/working
