<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['word'])) {
        echo  $_POST['word'] == 'word' ? 1 : 0;
    }
    unset($_POST);
    exit;
}
