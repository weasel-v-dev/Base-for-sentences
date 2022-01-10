<?php

namespace methods;

use PDO;
use PDOException;

class DB extends BaseDB
{
    static function connect_db() {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=cards_lang;charset=utf8;', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            /***
            PDO::FETCH_CLASS - GET custom class object

            class CustomClass {
            public $custom_property;
            public $custom_value;
            public function get_custom_property {
            return $custom_property;
            }
            public function get_custom_value {
            return $custom_value;
            }
            }
             *  $object = $pdo->query("SELECT * FROM words by user_id");
            $object->setFetchMode(PDO::FETCH_CLASS, 'CustomClass')
            while($column = $object->fetch(PDO::FETCH_ASSOC))) {
            echo $column->get_custom_property() . ' | ' . $column->get_custom_value();
            }

            while($column = self::$pdo->query("SELECT * FROM words by user_id")->fetch(PDO::FETCH_ASSOC)) {
                echo $column['id'] . ' | ' . $column['word'];
            }
             */
        } catch(PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    static function exist_tables() {

    }

    static function exist_column() {

    }
}