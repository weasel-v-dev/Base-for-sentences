<?php
require_once 'controllers/HomeController.php';
require_once 'models/DB.php';
require_once 'models/AppDB.php';

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET' :
        echo \controllers\HomeController::index();
    break;
    case 'POST' :
        strlen(htmlspecialchars($_POST['word_truth']);
        if(7 == similar_text(htmlspecialchars($_POST['word_truth']), htmlspecialchars($_POST['word_maybe_truth']))) {
            echo 1;
        }
    break;
}
echo '<pre>';
echo '<pre>';
var_dump(strlen('vitalik'));
echo '</pre>';
var_dump(similar_text('vitalik', 'vdtaleo' ));
echo '</pre>';
