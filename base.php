<?php
error_reporting(-1);

function logs($error) {
    ob_start();
    if($error != '') {
        echo '[' . date('H:i:s') . '] ';
            if(is_string($error)) {
                echo $error;
            }
            if(is_array($error)) {
                print_r($error);
            }
        echo "\r\n";
    }
    else {
        echo "\r\n\r\n\r\n";
    }
    $log = ob_get_clean();

    if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/logs/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/logs/');
    }
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/' . date('Y-m-d') . '-log.txt', $log . PHP_EOL, FILE_APPEND);
}