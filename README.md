[![Build Status](https://travis-ci.org/KEINOS/Explode_version.svg?branch=master)](https://travis-ci.org/KEINOS/Explode_version) [![Docker Cloud Build Status](https://img.shields.io/docker/cloud/build/keinos/explode_version.svg)](https://hub.docker.com/r/keinos/explode_version)

# Explode_version

`explode_version` command explodes a given version info in to JSON.

Useful to get version info into tokens for versioning. Mostly aimed to use for DockerHub's tag list.

- Requirements: PHP >= `5.6.40` ([PHP versions tested](https://travis-ci.org/KEINOS/Explode_version))
- If you have [Docker](https://www.docker.com/get-started) installed, **you may not need PHP to be installed**.
  - See [README_DOCKER.md](./README_DOCKER.md) for usage.

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
$ ./explode_version php7.0.1-cli-alpine3.0
{"php":{"name":"php","version":"7.0.1"},"cli":{"name":"cli"},"alpine":{"name":"alpine","version":"3.0"}}
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
