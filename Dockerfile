FROM olafbroms/asrc:asrc-php7.2-apache2

# apt-get update and needed packages
RUN apt-get update && apt-get install -qqy git unzip libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        default-mysql-client \
        nodejs \
        dos2unix \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/

#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN composer install --no-scripts --no-autoloader

RUN npm install

# get php code sniffer
RUN wget -O /tmp/phpcs.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
RUN cp /tmp/phpcs.phar /usr/local/bin/phpcs
RUN chmod +x /usr/local/bin/phpcs

# set phpcs config
RUN /usr/local/bin/phpcs --config-set show_progress 1 && \
    /usr/local/bin/phpcs --config-set colors 1 && \
    /usr/local/bin/phpcs --config-set report_width 140 && \
    /usr/local/bin/phpcs --config-set encoding utf-8

# get php code beautifier
RUN wget -O /tmp/phpcbf.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar
RUN cp /tmp/phpcbf.phar /usr/local/bin/phpcbf
RUN chmod +x /usr/local/bin/phpcbf

#RUN chmod +x /var/www/dock-files/startup.sh