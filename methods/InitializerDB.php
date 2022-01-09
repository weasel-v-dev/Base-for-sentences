<?php

use methods\DB;

class InitializerDB extends DB {
    static function migrate () {
        self::create_tables();
        self::create_column();
        self::set_default_values();
    }

    static function create_tables() {
        if(!self::exist_connect()) die('DB does not connect');
        return false;
    }

    static function create_column() {
       if(!self::exist_tables()) die('Table or tables do not create');
    }

    static function set_default_values() {
        if(!self::exist_column()) die('Column or columns do not create');
        [
            [
                'word_orig' => 'essentially',
                'word_trans' => 'по суті'
            ],
            [
                'word_orig' => 'completely',
                'word_trans' => 'повністю'
            ],
            [
                'word_orig' => 'fancy',
                'word_trans' => 'уява'
            ],
            [
                'word_orig' => 'anxiety',
                'word_trans' => 'занепокоєння'
            ],
            [
                'word_orig' => 'legitimacy',
                'word_trans' => 'легітимність'
            ],
            [
                'word_orig' => 'fear',
                'word_trans' => 'страх'
            ],
            [
                'word_orig' => 'depicts',
                'word_trans' => 'зображує'
            ],
            [
                'word_orig' => 'lie',
                'word_trans' => 'брехати'
            ],
            [
                'word_orig' => 'the reason',
                'word_trans' => 'причина'
            ],
            [
                'word_orig' => 'imagine',
                'word_trans' => 'уявіть собі'
            ],
            [
                'word_orig' => 'presently',
                'word_trans' => 'зараз'
            ],
            [
                'word_orig' => 'kept',
                'word_trans' => 'збережено'
            ],
            [
                'word_orig' => 'dwells',
                'word_trans' => 'мешкає'
            ],
            [
                'word_orig' => 'definitely',
                'word_trans' => 'безумовно'
            ],
            [
                'word_orig' => 'misled',
                'word_trans' => 'введено в оману'
            ],
            [
                'word_orig' => 'halt',
                'word_trans' => 'зупинка'
            ],
            [
                'word_orig' => 'troubles',
                'word_trans' => 'неприємності'
            ],
            [
                'word_orig' => 'riddled',
                'word_trans' => 'прорізаний'
            ],
            [
                'word_orig' => 'currently',
                'word_trans' => 'на даний момент'
            ],
            [
                'word_orig' => 'basically',
                'word_trans' => 'в основному'
            ],
            [
                'word_orig' => 'finally',
                'word_trans' => 'нарешті'
            ],
            [
                'word_orig' => '',
                'word_trans' => ''
            ],
        ];
    }
}