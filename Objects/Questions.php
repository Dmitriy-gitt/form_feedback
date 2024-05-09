<?php
require_once 'Mail.php';

class Questions extends Mail
{
    static $db;

    public function __construct($arg)
    {
        self::$db = $arg;
    }

    public function save(array $arg)
    {
        $query = mysqli_query(self::$db,"INSERT INTO questions SET ques='".$arg['ques']."', author='".$arg['author']."', topic='".$arg['topic']."', visitor='".$arg['visitor']."', mail='".$arg['mail']."'");
        if($query == 'true'){$this->adress_two='d.murzin1@yandex.ru'; $this->notify(); return 'Успешно сохранено';} else{return 'Ошибка сохранения';}
    }

    public function get($welcome, $topic, $start, $num)
    {
        $query = mysqli_query(self::$db,"SELECT id, ques, author, topic, visitor, mail FROM questions WHERE visitor='".$welcome."' AND topic='".$topic."' LIMIT $start, $num");
        while ($myrowC = mysqli_fetch_assoc($query)) {
            $ques_array[] = array(
                'id' => $myrowC["id"],
                'ques' => $myrowC["ques"],
                'author' => $myrowC["author"],
                'topic' => $myrowC["topic"],
                'visitor' => $myrowC["visitor"],
                'mail' => $myrowC["mail"]
            );
        }
        return $ques_array;
    }

    public function get_for_admin($topic, $start, $num)
    {
        $query = mysqli_query(self::$db,"SELECT * FROM questions WHERE topic = '$topic' LIMIT $start, $num");
        while ($myrowC = mysqli_fetch_assoc($query)) {
            $ques_array[] = array(
                'id' => $myrowC["id"],
                'ques' => $myrowC["ques"],
                'author' => $myrowC["author"],
                'topic' => $myrowC["topic"],
                'visitor' => $myrowC["visitor"],
                'mail' => $myrowC["mail"]
            );
        }
        return $ques_array;
    }

    public function get_sum_records($topic, $welcome=null)
    {
        $dop = ($welcome !== null) ? " AND visitor='$welcome'" : "";
        $query = mysqli_query(self::$db, "SELECT COUNT(*) FROM questions WHERE topic='$topic' $dop");
        $res = mysqli_fetch_array($query);

        return $res;
    }

    public function delete($id)
    {
        // Удаление из таблицы answers
        $query_answer = mysqli_query(self::$db, "DELETE FROM answers WHERE id_ques='$id'");

        // Удаление из таблицы questions
        $query = mysqli_query(self::$db, "DELETE FROM questions WHERE id='$id'");

        if($query == 'true'){return 'Успешно удалено';} else{return 'Ошибка удаления';}
    }
}


?>