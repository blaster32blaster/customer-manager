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

															echo "env validated, installing composer and npm dependencies"
															cd /var/www
															composer install
															npm install
															php artisan key:generate
															touch database/database.sqlite
															php artisan migrate:install
															php artisan migrate
															php artisan db:seed

															echo "dependencies installed, starting web server"
															apachectl -D FOREGROUND


