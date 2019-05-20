FROM keinos/php7-alpine:latest

RUN apk update \
    && apk add --update \
      php-json@php \
      php-ctype@php \
    && rm -rf /var/cache/apk/*

COPY explode_version /usr/local/bin/
COPY tests/run_test.sh /

ENTRYPOINT [ "/usr/local/bin/explode_version" ]
