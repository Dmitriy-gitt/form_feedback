<?php
require_once 'Mail.php';

class Answers extends Mail
{
    static $db;

    public function __construct($arg)
    {
        self::$db = $arg;
    }

    public function save(array $arg)
    {
        $query = mysqli_query(self::$db,"INSERT INTO answers SET answer='".$arg['answer']."', author='".$arg['author']."', id_ques='".$arg['id']."'");
        if($query == 'true'){$this->adress=$arg['mail']; $this->notify(); return 'Успешно сохранено';} else{return 'Ошибка сохранения';}
    }

    public function get($id)
    {
        $query = mysqli_query(self::$db,"SELECT id, answer, author FROM answers WHERE id_ques='".$id."'");
        while ($myrowC = mysqli_fetch_assoc($query)) {
            $answer_array[] = array(
                'id' => $myrowC["id"],
                'answer' => $myrowC["answer"],
                'author' => $myrowC["author"],
            );
        }
        return $answer_array;
    }

}

?>