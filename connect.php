<?php
require_once 'controllers/HomeController.php';
require_once 'models/DB.php';
require_once 'models/AppDB.php';

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET' :
        echo \controllers\HomeController::index(['number_page' => 1, 'count_elements_on_page' => 10]);
    break;
    case 'POST' :

        $number_page = htmlspecialchars($_POST['number_page']);
        $count_elements_on_page = htmlspecialchars($_POST['count_elements_on_page']);

        if(!empty($number_page) && !empty($count_elements_on_page)) {
            echo \controllers\HomeController::index(['number_page' => $number_page, 'count_elements_on_page' => $count_elements_on_page]);
        }

        $id = (int) htmlspecialchars($_POST['id']);

        if(!empty($id)) {
            \models\AppDB::remove_word($id);
            echo 'remove orig';
            die;
        }

        $word_orig = htmlspecialchars($_POST['word_orig']);
        $word_trans = htmlspecialchars($_POST['word_trans']);
        $word_id = htmlspecialchars($_POST['word_id']);

        if(!empty($word_orig) && !empty($word_trans) && !empty($word_id)) {
            print_r([$word_orig, $word_trans, $word_id]);
            echo \models\AppDB::update_word([$word_orig, $word_trans, $word_id]);
            die;
        }

        if(!empty($word_orig) && !empty($word_trans)) {
            echo \models\AppDB::set_word([$word_orig, $word_trans, 1]);
            die;
        }

        $word_truth = htmlspecialchars($_POST['word_truth']);
        $word_maybe_truth = htmlspecialchars($_POST['word_maybe_truth']);
        if(!empty($word_truth) && !empty($word_maybe_truth)) {
            echo 'check word truth and word maybe truth';
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


