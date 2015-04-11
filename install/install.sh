#!/bin/bash
echo -n "Enter Database Hostname or IP address > "
read dbhname
echo -n "Enter Database User Name > "
read dbuname
echo -n "Enter Database Password > "
read dbpwd
echo -n "Enter Database Name > "
read dbname
echo "You entered: $dbuname $dbpwd $dbname"

mysql --user=$dbuname --password=$dbpwd $dbname < db.sql

cat database.php.default | sed -e 's/hname/'$dbhname'/' | sed -e 's/dbname/'$dbname'/' | sed -e 's/dbuname/'$dbuname'/' | sed -e 's/dbpwd/'$dbpwd'/' >> ../application/config/database.php

echo "Your default username/password is admin/admin please change it after you login"