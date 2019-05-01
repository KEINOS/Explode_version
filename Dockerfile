FROM php:7.1.23-cli-alpine3.8

COPY explode_version /usr/local/bin/
COPY tests/run_test.sh /
ENTRYPOINT [ "/usr/local/bin/explode_version" ]
