<?php


namespace controllers;

use models\AppDB;

class HomeController
{
    static function index ($values) {
        return self::request(AppDB::get_words($values));
    }

    static function request ($array) {
        return json_encode($array, 1);
    }
}