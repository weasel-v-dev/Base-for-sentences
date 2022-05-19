<?php


namespace controllers;

use models\AppDB;

class HomeController
{
    static function index ($values, $where = '') {
        return self::request((array) AppDB::get_words($values, $where));
    }

    static function request ($array) {
        return json_encode($array, 1);
    }
}