TravisCI:[![Build Status](https://travis-ci.org/KEINOS/Explode_version.svg?branch=master)](https://travis-ci.org/KEINOS/Explode_version) DockerHub:[![Docker Cloud Build Status](https://img.shields.io/docker/cloud/build/keinos/explode_version.svg)](https://hub.docker.com/r/keinos/explode_version)

# Explode_version

`explode_version` command explodes a given version info in to JSON.

Useful to get version info into tokens for versioning. Mostly aimed to use for DockerHub's tag list.

## Usage

```shellsession
$ ./explode_version --help
Usage: explode_version [OPTION] VERSION

OPTION:
  -h, --help    This help.
      --pretty  Outputs with indentation.

VERSION: A string to be alanlized.

```

```shellsession
$ ./explode_version --pretty php:7.3.4-cli-alpine3.9
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
```

## Samples

### Usual

```shellsession
$ php --version
PHP 7.1.23 (cli) (built: Feb 22 2019 22:08:13) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
$ ls -l
total 32
-rw-r--r--  1 admin  staff   116  5  1 23:01 Dockerfile
-rw-r--r--  1 admin  staff  1063  5  1 15:05 LICENSE
-rw-r--r--  1 admin  staff   695  5  1 17:43 README.md
-rwxr-xr-x  1 admin  staff  3464  5  1 21:49 explode_version
drwxr-xr-x  4 admin  staff   136  5  1 22:00 tests
$ # Run
$ ./explode_version --pretty php7.0.1-cli-alpine3.0
{
    "php": {
        "name": "php",
        "version": "7.0.1"
    },
    "cli": {
        "name": "cli"
    },
    "alpine": {
        "name": "alpine",
        "version": "3.0"
    }
}
```

### Sample with Docker

```shellsession
$ docker --version
Docker version 18.09.0, build 4d60db4
$ ls
Dockerfile	LICENSE		README.md	explode_version	tests
$ # Build
$ docker build --tag explode_version .
...
$ # Run
$ docker run --rm explode_version --pretty "php:7.3.4-cli-alpine3.9"
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
```
