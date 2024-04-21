#!/bin/bash

# Check if anything was passed

if [ $# -eq 0 ]; then
    echo "No files were passed in to copy."
    exit 1
fi

# For loop used to copy all files passed into this shell script into my 
# sendlater public_html folder for viewing files

for file in "$@"; do
    sudo cp "$file" /var/www/visualvibe/
    echo "Copied $file to /var/www/visualvibe/"
done

sudo service apache2 restart
echo "Apache2 restarted"

