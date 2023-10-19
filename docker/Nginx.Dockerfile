FROM nginx:alpine

ADD docker/conf/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/laravel
