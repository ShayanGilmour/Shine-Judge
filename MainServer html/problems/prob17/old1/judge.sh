#!/bin/bash 

#echo "Just ran" > LOGER

#cp code.py /var/www/html/

wget MainIP/problems/prob17/checker1.cpp
wget MainIP/problems/prob17/checker2.cpp
wget MainIP/problems/prob17/input1
wget MainIP/problems/prob17/input2
g++ checker1.cpp -o checker1.out
g++ checker2.cpp -o checker2.out


timeout 0.1 python3 -m py_compile code.py &> syntax
FILESIZE=$(stat -c%s "syntax")

if [[ $FILESIZE -gt 2 ]]; then
        sed -i '1d' syntax
	mv syntax /var/www/html/result
	exit 0
fi

rm syntax

for ((i=1; i<21; i++))
do

	OUTPUT="$(timeout 0.1 python3 code.py < input1 > output$i)"
	status=$?

	if ((status==124)); then
	{
		echo "Time limit exceeded" >> /var/www/html/result
        }
        fi

done

for ((i=1; i<21; i++))
do

	cat output$i | while read line; do
	echo "$line" >> tmp
	done

done

./checker1.out < tmp

if [ ! -f goodanswer ];then
#        cat tmp | while read line; do
#        echo "$line" >> /var/www/html/result
#        done

 	echo "Not Accepted!" >> /var/www/html/result

	exit 0
fi

rm goodanswer

OUTPUT="$(timeout 0.1 python3 code.py < input2 > output)"
status=$?

if ((status==124)); then
{
	echo "Time limit exceeded" >> /var/www/html/result
}
fi

./checker2.out < output

if [ ! -f goodanswer ];then

 	echo  "Not Accepted!">> /var/www/html/result
	exit 0
fi

rm goodanswer

echo  "Accepted!" >> /var/www/html/result
