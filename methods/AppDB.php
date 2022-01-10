<?php
namespace methods;

class AppDB extends DB {
    static function fill_DB($table, $column, $value) {
        if(!self::exist_tables() && !self::exist_column()) return false;
    }

    static function get_values() {
        self::exist_tables();
        return false;
    }

    public static function set_value()
    {
    }
}