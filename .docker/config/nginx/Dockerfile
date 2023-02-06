FROM nginx:1.14.2

LABEL Maintainer = "Hernan Cardoso <cardoso@fromdoppler.com>"

COPY ./default.conf /etc/nginx/conf.d/default.conf

ARG WEB_PORT

RUN export WEB_PORT=${WEB_PORT} ; sed -i -r "s/WEB_PORT/${WEB_PORT}/g" /etc/nginx/conf.d/default.conf