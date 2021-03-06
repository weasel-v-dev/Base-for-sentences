<?php

namespace models;

use PDOException;

class InitializerDB extends DB {

    public static function migrate_start () {
        $pdo = self::connect_db();
        self::create_tables($pdo);
        self::set_default_values($pdo);
    }

    protected static function create_tables($pdo) {
        try {
            $pdo->exec("CREATE table  IF NOT EXISTS Vocabulary(
                 ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                 word_origin VARCHAR( 50 ) NOT NULL, 
                 word_translate VARCHAR( 250 ) NOT NULL,
                 User_id INT( 11 ) NOT NULL)");
        } catch(PDOException $e) {
            logs($e->getMessage());
        }
    }

    protected static function set_default_values($pdo) {
        if(self::get_all_count_words_from_DB($pdo)) return false;

        $default_values = [
            [
                'essentially',
                'по суті',
                1,
            ],
            [
                'completely',
                'повністю',
                1,
            ],
            [
                'fancy',
                'уява',
                1,
            ],
            [
                'anxiety',
                'занепокоєння',
                1,
            ],
            [
                'legitimacy',
                'легітимність',
                1,
            ],
            [
                'fear',
                'страх',
                1,
            ],
            [
                'depicts',
                'зображує',
                1,
            ],
            [
                'lie',
                'брехати',
                1,
            ],
            [
                'the reason',
                'причина',
                1,
            ],
            [
                'imagine',
                'уявіть собі',
                1,
            ],
            [
                'presently',
                'зараз',
                1,
            ],
            [
                'kept',
                'збережено',
                1,
            ],
            [
                'dwells',
                'мешкає',
                1,
            ],
            [
                'definitely',
                'безумовно',
                1,
            ],
            [
                'misled',
                'введено в оману',
                1,
            ],
            [
                'halt',
                'зупинка',
                1,
            ],
            [
                'troubles',
                'неприємності',
                1,
            ],
            [
                'riddled',
                'прорізаний',
                1,
            ],
            [
                'currently',
                'на даний момент',
                1,
            ],
            [
                'basically',
                'в основному',
                1,
            ],
            [
                'finally',
                'нарешті',
                1,
            ],
            [
                'relate',
                'відноситись',
                1,
            ],
        ];

        try {
            $stmt = $pdo->prepare("INSERT INTO Vocabulary (word_origin, word_translate, User_id) VALUES (?, ?, ?)");
            $pdo->beginTransaction();
            foreach ($default_values as $i => $value) {
                $stmt->execute($value);
            }
            $pdo->commit();

        } catch(PDOException $e) {
            logs($e->getMessage());
        }
    }
}