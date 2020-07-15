FROM nginx:1.16.0
# COPY ./init/www.conf /etc/nginx/conf.d/www.conf
COPY init/pro.conf /etc/nginx/conf.d/pro.conf
RUN rm -f /etc/nginx/conf.d/default.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
