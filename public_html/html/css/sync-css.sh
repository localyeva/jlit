#!/bin/bash
clear
pwd
lessc /var/www/jlit/public_html/html/css/style.less > /var/www/jlit/public_html/html/css/styles.css
cp /var/www/jlit/public_html/html/css/styles.css /var/www/jlit/public_html/wp-content/themes/virtue/assets/css/styles.css
echo "-------------------------------"
echo "run less sh"
echo "-------------------------------"

