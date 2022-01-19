<?php
namespace models;

class AppDB extends DB {

    private static function paginationCalculate ($number_page, $count_elements_on_page) {
        return ($number_page -1) * $count_elements_on_page;
    }

    public static function get_words($values) {
        try {
            $array = [];
            $pdo = self::connect_db();
            $stmt = $pdo->prepare("SELECT id, Word_origin, Word_translate FROM Vocabulary LIMIT :from_number, :num;");
            $stmt->bindParam(':num', $values['count_elements_on_page'], $pdo::PARAM_INT);
            $stmt->bindParam(':from_number', self::paginationCalculate($values['number_page'], $values['count_elements_on_page']), $pdo::PARAM_INT);
            $stmt->execute();

            while ($row = $stmt->fetch($pdo::FETCH_ASSOC)) {
                $array[] = $row;
            }
        } catch (\Exception $e) {
            logs($e->getMessage());
            return false;
        }
        return $array;
    }

    public static function set_word($default_value)
    {
        try {
            $pdo = self::connect_db();
            $stmt = $pdo->prepare("INSERT INTO Vocabulary (Word_origin, Word_translate, User_id) VALUES (?, ?, ?)");
            $pdo->beginTransaction();
            $stmt->execute($default_value);
            echo $pdo->lastInsertId();
            $pdo->commit();

        } catch(\PDOException $e) {
            logs($e->getMessage());
        }
    }

    public static function remove_word($value)
    {
        try {
            $pdo = self::connect_db();
            $stmt = $pdo->prepare("DELETE FROM Vocabulary WHERE id = :id");
            $stmt->bindParam(':id', $value, $pdo::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount();
        } catch(\PDOException $e) {
            logs($e->getMessage());
        }
    }

    public static function update_word($value)
    {
        try {
            $pdo = self::connect_db();
            $stmt = $pdo->prepare('UPDATE Vocabulary SET Word_origin = ?, Word_translate = ? WHERE id = ?');

            $stmt->execute($value);

        } catch(\PDOException $e) {
            logs($e->getMessage());
        }


    }
}