#!/usr/bin/env bash

FILE=/var/www/current/.env.local     
if [ -f $FILE ]; then
   echo "Remove file $FILE"
   rm -rf $FILE
fi

echo "Expose env vars to $FILE"
echo "DATABASE_URL=$DATABASE_URL" >> /var/www/current/.env.local
