#!/bin/bash 
rm test/*

rand="$((1 + RANDOM))"
echo $rand >> Log

cp main.html test/index.html
cp main.css test/$rand.css

line=$(head -n 1 colorfile)
COMMAND="'s/MainColor/$line/g'"
COMMAND="sed -i $COMMAND test/$rand.css"
eval $COMMAND

sed -i '1d' colorfile
line=$(head -n 1 colorfile)
COMMAND="'s/BoxColor/$line/g'"
COMMAND="sed -i $COMMAND test/$rand.css"
eval $COMMAND

sed -i '1d' colorfile
line=$(head -n 1 colorfile)
COMMAND="'s/HeaderColor/$line/g'"
COMMAND="sed -i $COMMAND test/$rand.css"
eval $COMMAND


sed -i '1d' colorfile
line=$(head -n 1 colorfile)
COMMAND="'s/TerminalColor/$line/g'"
COMMAND="sed -i $COMMAND test/$rand.css"
eval $COMMAND

sed -i '1d' colorfile
line=$(head -n 1 colorfile)
COMMAND="'s/TerminalText/$line/g'"
COMMAND="sed -i $COMMAND test/$rand.css"
eval $COMMAND


COMMAND="'s/cssfile/$rand/g'"
COMMAND="sed -i $COMMAND test/index.html"
eval $COMMAND
#echo $COMMAND >> WHATT
#sed -i $COMMAND test/$rand.css &> LOG
done

