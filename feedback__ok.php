<?php
require_once 'Objects/Questions.php';
require_once 'Objects/Answers.php';
require '../parts_of_site/lock.php';
if ($access_rights == 1 or $access_rights ==2) {}
else {$warning_message = 'У вас недостаточно прав! <a href="javascript: history.go(-1)">Вернуться назад &larr;</a>.'; require '../parts_of_site/warning.php';}

function call_object($object, $method, $values, $db)
{
    $obj = new $object($db);
    $return = $obj->$method($values);

    return $return;
}

if(isset($_POST['ques']))
{
    $ques_ok = call_object(new Questions($db), 'save', $_POST['ques'], $db);
}

if(isset($_POST['answer']))
{
    $answer_ok = call_object(new Answers($db), 'save', $_POST['answer'], $db);
}

if(isset($_POST['del']))
{
    $del_ok = call_object(new Questions($db), 'delete', $_POST['del'], $db);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="2; url=feedback.php?output=output__ques.php">
    <?php require 'header.php';?>
    <?php echo $ques_ok;?>
    <?php echo $answer_ok;?>
    <?php echo $del_ok;?>
</head>
<body>
    
</body>
</html>