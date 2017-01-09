FROM php:7.1-fpm

COPY php/config/php/php.ini /usr/local/etc/php/

# -----------------------------------------------------------------------------
# SET CORRECT TIMEZONE
# -----------------------------------------------------------------------------
RUN mv /etc/localtime /etc/localtime.bak \
    && ln -s /usr/share/zoneinfo/Europe/London /etc/localtime

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN \
    apt-get update && \
    apt-get install -y \
        libldap2-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        vim \
        libmcrypt-dev \
        php-pear \
        curl \
        wget \
        git \
        zip \
        supervisor \
        cron \
        sendmail-bin \
        libxml2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install ldap \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install xml

RUN curl -Lo /tmp/xdebug-2.4.0.tgz http://xdebug.org/files/xdebug-2.4.0.tgz \
    && tar -xvzf /tmp/xdebug-2.4.0.tgz -C /tmp \
    && cd /tmp/xdebug-2.4.0 \
    && phpize \
    && ./configure \
    && make \
    && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20151012

COPY php/config/php/xdebug.ini /usr/local/etc/php/conf.d/

# -----------------------------------------------------------------------------
# NEWRELIC INSTALLATION
# -----------------------------------------------------------------------------

RUN mkdir /usr/local/lib/newrelic/ \
    && cd /usr/local/lib/newrelic/ \
    && wget -r -nd --no-parent -Alinux.tar.gz http://download.newrelic.com/php_agent/release/ >/dev/null 2>&1 \
    && export NR_INSTALL_SILENT=true \
    && mv newrelic-php5-* newrelic-php5-linux.tar.gz \
    && tar -xzvf newrelic-php5-linux.tar.gz --strip=1 \
    && ./newrelic-install install

# -----------------------------------------------------------------------------
# COPY CRON
# -----------------------------------------------------------------------------
COPY php/config/crontab/crontab /etc/

# -----------------------------------------------------------------------------
# COPY SUPERVISOR CONF
# -----------------------------------------------------------------------------
COPY php/config/supervisord/supervisord.conf /etc/
COPY php/config/supervisord/conf.d /etc/supervisor/conf.d/

# -----------------------------------------------------------------------------
# DEFAULT ENVIRONMENT VARIABLES
# -----------------------------------------------------------------------------
ENV DB_INIT false
ENV PHP_INI dev
ENV ENABLE_XDEBUG false
ENV APP_ENV dev

# -----------------------------------------------------------------------------
# PHP ini and pool configurations
# -----------------------------------------------------------------------------
COPY php/config/php /usr/local/etc/php/config
COPY php/config/pool /usr/local/etc/php-fpm.d

# -----------------------------------------------------------------------------
# Copy Run entry script
# -----------------------------------------------------------------------------
COPY php/run.sh /
RUN chmod 755 /run.sh

CMD ["/run.sh"]