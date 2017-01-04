FROM nginx:1.10

# Nginx Config
COPY nginx/config/nginx.conf /etc/nginx/nginx.conf

# Site Vhost config
COPY nginx/conf.d /etc/nginx/conf.d
COPY nginx/sites-available /etc/nginx/sites-available
RUN mkdir /etc/nginx/sites-enabled

# Install Vim - can be removed once we're confident with this image
RUN apt-get update && apt-get install -y nano

# Change the UID of nginx for OSX writing permission problem
RUN usermod -u 1000 nginx

# -----------------------------------------------------------------------------
# DEFAULT ENVIRONMENT VARIABLES
# -----------------------------------------------------------------------------
ENV NGINX_CONF dev
ENV SITE_TYPE default

# -----------------------------------------------------------------------------
# Copy Run entry script
# -----------------------------------------------------------------------------
COPY nginx/run.sh /
RUN chmod 755 /run.sh

CMD ["/run.sh"]