FROM nginx

# disable default site
RUN > /etc/nginx/conf.d/default.conf

# copy over our own config
COPY ./config/nginx/twue.conf /etc/nginx/conf.d/twue.conf

WORKDIR /var/www
EXPOSE 80
