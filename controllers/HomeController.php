<?php


namespace controllers;

use models\AppDB;

class HomeController
{
    static function index () {
        return self::request(AppDB::get_values());
    }

    static function request ($array) {
        return json_encode($array, 1);
    }
}