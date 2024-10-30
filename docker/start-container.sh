#!/usr/bin/env bash

ROLE=${ROLE:-role}
APPENV=${APPENV:-production}

echo "App running on $APPENV environment."

if [ $ROLE == "app" ]; then
	echo "App started"
	/usr/local/bin/release-tasks.sh
	/usr/local/sbin/php-fpm -F
fi
