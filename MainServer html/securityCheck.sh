#!/bin/bash
OUTPUT="$(wc -l < /var/www/html/Log18455)" 

if [ "$OUTPUT" -gt 6000 ]; then
	rm /var/www/html/submitPermission
fi
