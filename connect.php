<?php
require_once 'controllers/HomeController.php';
require_once 'models/DB.php';
require_once 'models/AppDB.php';

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET' :
        echo \controllers\HomeController::index();
    break;
    case 'POST' :
        $length = strlen(htmlspecialchars($_POST['word_truth']));
        $strong_estimate = 3;
        if($length < 5) {
            $strong_estimate = 1;
        }
        for ($i=0;$i<$strong_estimate;$i++) {
            if($length == similar_text(htmlspecialchars($_POST['word_truth']), htmlspecialchars($_POST['word_maybe_truth']))) {
                echo 1;
                break;
            }
            --$length;
        }
    break;
}


