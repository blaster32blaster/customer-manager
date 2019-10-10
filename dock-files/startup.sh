#!/bin/sh

ENV=/var/www/.env
EXAMPLE=/var/www/.env.example

if [ -f "$ENV" ]
then
	echo "env exists, not creating"
else
	echo "env doesnt exist, checking for example to copy"
	if [ -f "$EXAMPLE" ]
	then
		echo "env example exists, copying to .env"
		cp /var/www/.env.example /var/www/.env
	else
		echo "env example not found, env not created"
	fi
fi
echo "startup script run, removing existing git hooks ..."
rm ../.git/hooks/*
echo "existing hooks removed, creating new hooks"
cp -r ../dock-files/hooks/* ../.git/hooks/
chmod +x ../.git/hooks/*

echo "hooks created, installing composer and npm dependencies"
cd /var/www
composer install
npm install

echo "dependencies installed, starting web server"
apachectl -D FOREGROUND

