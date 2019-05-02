#!/usr/bin/env sh

# Alias/ShortCut to run the script via Docker

name_base_image='keinos/explode_version:latest'

docker run --rm $name_base_image "$@"

