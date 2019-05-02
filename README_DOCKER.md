# `explode_version` for Docker

Docker image is provided for those who don't want to install PHP in addition.

- Docker image: `keinos/docker_version`
- Docker Hub: <https://hub.docker.com/r/keinos/explode_version>
- Requirements:
  - Docker >= 18.09.0 (Tested version)
  - Git >= 2.20.1 (Tested version)

```shellsession
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
```

## Build your own

You can build the docker image locally if want.

```shellsession
$ # Clone and move to the repository.
$ git clone https://github.com/KEINOS/Explode_version.git explode_version && cd $_
...
$ # Build docker image
$ docker build -t my_explode_version .
...
$ # Run to see work
$docker run --rm my_explode_version --pretty "php:7.3.4-cli-alpine3.9"
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

## Useful tips

If you don't need much speed to process the command but want to use it easily, then it is recommended to create a shell script as an alias.

1. Either Create/Copy/Download/Clone the shell script file "`explode_version.sh`" below:

    ```bash
    #!/usr/bin/env sh
    #
    # Alias/ShortCut to run the script via Docker
    #

    # Image name to use
    name_base_image='keinos/explode_version:latest'

    # Run container with the image avobe
    docker run --rm $name_base_image "$@"

    ```

    - Copy : <https://github.com/KEINOS/Explode_version/blob/master/explode_version.sh>
    - Download: <https://KEINOS.github.io/Explode_version/explode_version.sh>
    - Clonse: `https://github.com/KEINOS/Explode_version.git`

2. Change mode of the file:

    ```shellsession
    $ # Move to dir of the script
    $ cd /path/to/downloaded/dir/
    $ # Change mode
    $ chmod +x explode_version
    $ # Check if it works
    $ ./explode_version.sh --pretty 2.3.4-alpine3.4
    ...
    ```

3. SymLink to ENV path (Optional)

    Symbolic linking the script into the directory in env path(`$PATH`) might be handy.

    ```shellsession
    $ # SymLinking
    $ sudo ln /path/to/downloaded/dir/explode_version.sh /usr/local/bin/explode_version
    $ # Check if it works in any directory
    $ cd ~/
    $ explode_version.sh --pretty 2.3.4-alpine3.4
    ...
    ```
