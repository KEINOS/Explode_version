<?php

/* [Settings] ============================================================== */

const NAME_CMD = 'explode_version';
const DIR_SEP  = DIRECTORY_SEPARATOR;
const SUCCESS  = 0;
const FAILURE  = 1;

/* [Main] ================================================================== */

$name_file_sample = 'sample.json';
$path_file_sample = dirname(__FILE__) . DIR_SEP . $name_file_sample;

echo 'Running tests:', PHP_EOL;

$has_error = false;
$error_msg = '';

$pointer   = fopen($path_file_sample, 'r');
while ($line = fgets($pointer)) {
    if (empty(trim($line))) {
        continue;
    }
    $test   = json_decode($line, JSON_OBJECT_AS_ARRAY);
    $sample = $test['sample'];
    $expect = trim(json_encode($test['expect']));
    $result = trim(run_command($sample));
    if ($expect !== $result) {
        $error_msg .= 'ERROR : ' . $result . PHP_EOL;
        $error_msg .= 'Expect: ' . $expect . PHP_EOL;
        $has_error = true;
        echo '*';
        continue;
    }
    echo '.';
}
fclose($pointer);

echo PHP_EOL . 'Test finished: ';
if ($has_error) {
    echo 'Failed.' . PHP_EOL;
    print_error($error_msg);
    exit(FAILURE);
}
echo 'Success.', PHP_EOL;
exit(SUCCESS);

/* [Functions] ============================================================= */

function get_path_command()
{
    static $path_file_command;

    if (isset($path_file_command)) {
        return $path_file_command;
    }

    $path_file_command = dirname(dirname(__FILE__)) . DIR_SEP . NAME_CMD;
    if (! is_file($path_file_command)) {
        print_error('Command file not found.');
        exit(FAILURE);
    }

    return $path_file_command;
}

function print_error($message)
{
    $message = trim($message) . PHP_EOL;
    fputs(STDERR, $message);
}

function run_command($argument)
{
    $path_file_command = get_path_command();
    $command   = "${path_file_command} '${argument}'";
    $last_line = trim(exec($command, $output, $return_var));
    $result    = empty($last_line) ? implode(PHP_EOF, $output) : $last_line;
    if (SUCCESS === $return_var) {
        return $result;
    }
    print_error('* Failed to run command.');
    print_error(addslashes($result));
    exit(FAILURE);
}
