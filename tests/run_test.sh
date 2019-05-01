#!/usr/bin/env sh
# Simple test to run indide the docker container.

set -ue

# Path
# ----
which explode_version

# Option
# ------
explode_version -h > /dev/null 2>&1
explode_version --help > /dev/null 2>&1

# Data1 (Standard output)
# -----------------------
expect='{"php":{"name":"php","version":"7.3.4"},"cli":{"name":"cli"},"alpine":{"name":"alpine","version":"3.9"}}'

result=$(explode_version php:7.3.4-cli-alpine3.9)
[ ${expect} = ${result} ]

# Data2 (Pretty output)
# ---------------------
expect=$(cat <<'JSON'
{
    "php": {
        "name": "php",
        "version": "7.3.4"
    },
    "cli": {
        "name": "cli"
    },
    "alpine": {
        "name": "alpine",
        "version": "3.9"
    }
}
JSON
)

# Short option
result=$(explode_version -p php:7.3.4-cli-alpine3.9)
[ "${expect}" = "${result}" ]
# Long option
result=$(explode_version --pretty php:7.3.4-cli-alpine3.9)
[ "${expect}" = "${result}" ]
