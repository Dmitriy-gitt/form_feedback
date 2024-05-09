<?php
require_once 'Objects/Questions.php';
require_once 'Objects/Answers.php';
require '../parts_of_site/lock.php';
if ($access_rights == 1) {}
else {$warning_message = 'У вас недостаточно прав! <a href="javascript: history.go(-1)">Вернуться назад &larr;</a>.'; require '../parts_of_site/warning.php';}
?>
<?php
$questions_obj = new Questions($db);
$answers_obj = new Answers($db);

if($_GET['id']){

    $topic = $_GET['id'];
    function call_sum_records($object, $get)
    {
        //$result = mysqli_query($db, "SELECT COUNT(*) FROM answers WHERE id_ques IN (SELECT id FROM questions WHERE topic = 2)");
        // Определяем общее число сообщений в базе данных
        return $object->get_sum_records($get);
    }

    $temp = call_sum_records($questions_obj ,$_GET['id']);
}



require_once 'pagination/nav.php';
?>

<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .ques {
    border: 1px solid black;
    padding: 10px;
    margin: 10px;
    }
    
    </style>
<meta>
    <?php require 'header.php';?>
</head>
<body>
<?php 
    if (!empty($ques)) {$count = count($ques);} else { $count = 0;}
    do {
        $ques = $questions_obj->get_for_admin($topic, $start, $num);
        
        if (is_array($ques) || $ques instanceof Countable) {
            for($i=0; $i<count($ques); $i++){
                $answers = $answers_obj->get($ques[$i]['id']);
                echo"
            <div class='ques'>Автор: ".$ques[$i]['author']."<br> Пользователь: ".$ques[$i]['visitor']."<br><p style='border-bottom: 1px solid black;'>".$ques[$i]['ques']."
            <form method='post' action='feedback__ok.php'><button style='float: inline-end; transform: translate(0px, -30px);' name='del' value='{$ques[$i]['id']}'>Удалить</button></form></p>";
        if(is_array($answers)){foreach($answers as $ans)
            {
            echo "
            <div>
                <p><strong>Ответ от:</strong> ".$ans['author']."</p>
                <p style='border-bottom: 1px solid black;'>".$ans['answer']."</p>
            </div>";
            }
        }    
            echo "
            <button class='toggle-form'>Ответить</button>
            <form method='post' action='feedback__ok.php' class='answer-form' style='display: none;'>
                <textarea style='height: 100px; width: 927px;' name='answer[answer]'></textarea>
                <input type='hidden' value='".$ques[$i]['id']."' name='answer[id]'>
                <input type='hidden' value='".$welcome."' name='answer[author]'>
                <input type='hidden' value='".$ques[$i]['mail']."' name='answer[mail]'>
                <input type='submit' value='Ответить'><br>
            </form></div>
            ";
            }
    }
        $start += $num;
    } while ($count > 0);
?>
<script src="js/func.js"></script>

<?php
require_once 'pagination/pagAdmin.php';
?>

</body>
</html>