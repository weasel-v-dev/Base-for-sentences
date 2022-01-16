<?php
require_once 'controllers/HomeController.php';
require_once 'models/DB.php';
require_once 'models/AppDB.php';

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET' :
        echo \controllers\HomeController::index();
    break;
    case 'POST' :

        $word_orig = htmlspecialchars($_POST['word_orig']);
        $word_trans = htmlspecialchars($_POST['word_trans']);

        if(!empty($word_orig) && !empty($word_trans)) {
            echo \models\AppDB::set_value([$word_orig, $word_trans, 1]);
        }


        $word_truth = htmlspecialchars($_POST['word_truth']);
        $word_maybe_truth = htmlspecialchars($_POST['word_maybe_truth']);
        if(!empty($word_truth) && !empty($word_maybe_truth)) {
            $length = strlen(htmlspecialchars($word_truth));
            $strong_estimate = 3;
            if($length < 5) {
                $strong_estimate = 1;
            }
            for ($i=0;$i<$strong_estimate;$i++) {
                if($length == similar_text($word_truth, $word_maybe_truth)) {
                    echo $length;
                    break;
                }
                --$length;
            }
            die;
        }

    break;
}


