#!/bin/bash 

#echo "Just ran" > LOGER

#cp code.py /var/www/html/

wget MainIP/problems/prob11/checker.cpp

g++ checker.cpp -o checker.out


timeout 5 g++ code.cpp -o code.out &> syntax
FILESIZE=$(stat -c%s "syntax")

if [[ $FILESIZE -gt 2 ]]; then
        sed -i '1d' syntax
	mv syntax /var/www/html/result
	exit 0
fi

rm syntax

for ((i=1; i<100; i++))
do

	if [ ! -f input$i ]; then
		echo -ne "\nAccepted!" >> /var/www/html/result
		echo -ne "1" >> /var/www/html/codeAccepted
    		exit 0
	fi
	echo -ne "Test $i: " >> /var/www/html/result

	OUTPUT="$(timeout 0.2 ./code.out < input$i > output$i)"
	status=$?
#	echo $status &> what
	if ((status==124)); then
	{
		echo -ne " Time limit exceeded\n" >> /var/www/html/result
#		echo -ne "This page is a little tricky! Please reload this page once; To make sure your browser is loading the correct data.\n\n" >> /var/www/html/wrong

		echo -ne "\n" >> input$i

                cat input$i | while read line; do
                echo "$line" >> /var/www/html/wrong
                done

#		cp input$i /var/www/html/wrong
		exit 0
        }
        fi

#	wdiff output$i ans$i &> /dev/null

       echo -ne "\nInput:\n" >> /var/www/html/result
        cat input$i | while read line; do
#        echo "$line" >> tmp
       echo -ne " $line\n" >> /var/www/html/result
        done

       echo -ne "Output:\n" >> /var/www/html/result
        cat output$i | while read line; do
        echo "$line" >> tmp
       echo -ne "$line\n" >> /var/www/html/result
        done

       echo -ne "Answer:\n" >> /var/www/html/result
        cat ans$i | while read line; do
        echo "$line" >> tmp
       echo -ne "$line\n" >> /var/www/html/result
        done


	./checker.out < tmp
	rm tmp	

	if [ -f badanswer ]
	then
	{
 		echo -ne " Wrong answer\n" >> /var/www/html/result
		
#		echo -ne "This page is a little tricky! Please reload this page once; To make sure your browser is loading the correct data.\n\n" >> /var/www/html/wrong

                echo -ne "\n" >> input$i
                echo -ne "\n" >> ans$i
                echo -ne "\n" >> output$i


		echo -ne "Input:\n" >> /var/www/html/wrong

                cat input$i | while read line; do
                echo "$line" >> /var/www/html/wrong
                done
		
		echo -ne "\n\nAnswer:\n" >> /var/www/html/wrong
		cat ans$i | while read line; do
    		echo "$line" >> /var/www/html/wrong
		done

                echo -ne "\n\nYour output:\n" >> /var/www/html/wrong
                cat output$i | while read line; do
                echo "$line" >> /var/www/html/wrong
                done

                echo -ne "\n\nToo much diffrence.\n" >> /var/www/html/wrong
		
		exit 0
 	}

         else
              echo -ne " Ok\n\n\n" >> /var/www/html/result
         fi


done
