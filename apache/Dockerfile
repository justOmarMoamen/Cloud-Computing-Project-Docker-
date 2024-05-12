FROM httpd:2.4

# Install PHP and required extensions
RUN apt-get update && \
    apt-get install -y \
    php libapache2-mod-php php-mysql && \
    apt-get clean

# Copy custom configuration file to enable PHP in Apache
COPY ./conf/php.conf /usr/local/apache2/conf/php.conf

# Copy website content to the htdocs directory
COPY ./webapp /usr/local/apache2/htdocs/

# Ensure Apache is configured to run with PHP
RUN echo "Include /usr/local/apache2/conf/php.conf" >> /usr/local/apache2/conf/httpd.conf