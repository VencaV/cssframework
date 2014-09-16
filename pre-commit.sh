#!/bin/sh
echo "Exporting HTML files"
grunt export
echo 
touch .commit 
exit