<?php
namespace models;

class AppDB extends DB {
    static function fill_DB($table, $column, $value) {
        
    }

    static function get_values() {
        try {
            $array = [];
            $pdo = self::connect_db();
            $stmt = $pdo->prepare('SELECT Word_origin, Word_translate FROM Vocabulary WHERE User_id = ?');
            $stmt->execute([1]);

            while ($row = $stmt->fetch($pdo::FETCH_ASSOC)) {
                $array[] = $row;
            }
        } catch (\Exception $e) {
            logs($e->getMessage());
            return false;
        }
        return $array;
    }

    public static function set_value()
    {
    }
}