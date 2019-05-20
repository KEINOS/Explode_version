[![](https://images.microbadger.com/badges/image/keinos/explode_version.svg)](https://microbadger.com/images/keinos/explode_version "View detailed image info on microbadger.com") [![Build Status](https://travis-ci.org/KEINOS/Explode_version.svg?branch=master)](https://travis-ci.org/KEINOS/Explode_version) [![Docker Cloud Build Status](https://img.shields.io/docker/cloud/build/keinos/explode_version.svg)](https://hub.docker.com/r/keinos/explode_version)

# Explode Version Number to JSON

The `explode_version` command (or the script) explodes a given version info in to JSON object string.

Useful to get version info into tokens for versioning. Mostly aimed to use for DockerHub's tag list.

For example, the string "`php:7.3.4-cli-alpine3.9`" becomes as below:

```json
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

## Usage

- For **NON Docker Users**:
  - Requirements: PHP >= `5.6.40` ([PHP versions tests](https://travis-ci.org/KEINOS/Explode_version))
  - Source Code:
    - View: https://github.com/KEINOS/Explode_version/blob/master/explode_version
    - Download: https://KEINOS.github.io/Explode_version/explode_version

  - Sample Usage:

    ```shellsession
    $ # With --pretty option
    $ ./explode_version --pretty 'php 7.3.4-cli-alpine3.9'
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
    $
    $ # With no option
    $ ./explode_version php7.0.1-cli-alpine3.0
    {"php":{"name":"php","version":"7.0.1"},"cli":{"name":"cli"},"alpine":{"name":"alpine","version":"3.0"}}
    ```

- For **Docker Users**:
  - Docker Image: `keinos/explode_version` @ Docker Hub
  - Repositories:
    - Image : https://hub.docker.com/r/keinos/explode_version @ DockerHub
    - Source: https://github.com/KEINOS/Explode_version/blob/master/Dockerfile @ GitHub
  - Sample usage:

    ```shellsession
    $ # With --pretty option
    $ docker run --rm keinos/explode_version --pretty "php:7.3.4-cli-alpine3.9"
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
    $
    $ # With no option
    $ docker run --rm keinos/explode_version php7.0.1-cli-alpine3.0
    {"php":{"name":"php","version":"7.0.1"},"cli":{"name":"cli"},"alpine":{"name":"alpine","version":"3.0"}}
    ```

  - See: [README_DOCKER.md](https://github.com/KEINOS/Explode_version/blob/master/README_DOCKER.md) for more


## Help

```shellsession
$ ./explode_version --help
Usage: explode_version [OPTION] VERSION

OPTION:
  -h, --help    This help.
      --pretty  Outputs with indentation.

VERSION: A string to be alanlized.

```
