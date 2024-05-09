<?php
require_once 'Objects/Questions.php';
require '../parts_of_site/lock.php';
if ($access_rights == 1 or $access_rights ==2) {}
else {$warning_message = 'У вас недостаточно прав! <a href="javascript: history.go(-1)">Вернуться назад &larr;</a>.'; require '../parts_of_site/warning.php';}
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'header.php';?>
</head>
<body>
<div class="conteiner"> 
 <!-- проверка формы. Начало --> 
 <script> 
    function checkForm(form) { 
    let name = form.name.value; 
    let n = name.match(/^[A-Za-zА-Яа-я ]*[A-Za-zА-Яа-я ]+$/); 
    if (!n) { 
    alert("Имя введено неверно, пожалуйста исправьте ошибку"); 
    return false; 
                    }
    /* var phone = form.phone.value; 
    var p = phone.match(/^[0-9+][0-9- ]*[0-9- ]+$/); 
    if (!p) { 
    alert("Телефон введен неверно"); 
    return false; 
                    } */
    var mail = form.mail.value; 
    var m = mail.match(/^[A-Za-z0-9][A-Za-z0-9\._-]*[A-Za-z0-9_]*@([A-Za-z0-9]+([A-Za-z0-9-]*[A-Za-z0-9]+)*\.)+[A-Za-z]+$/); 
    if (!m) { 
    alert("E-mail введен неверно, пожалуйста исправьте ошибку"); 
                        return false;
                    }
    return true; 
                }
 </script> 
 <!-- проверка формы. Конец --> 
 
 
 <form method="post" action="feedback__ok.php" onSubmit="return checkForm(this)"> 
 
 <div class="left" style='width: 100px;'> 
    <p><label for='author'>Имя:</label> 
    <input style='width:300px;' type="text" name="ques[author]" /></p>
    
    <!-- <label for="phone">Телефон:</label> 
    <input maxlength="30" type="text" name="phone" />  -->
    
    <p><label for="mail">E-mail:</label> 
    <input style='width:300px;' type="text" name="ques[mail]" /></p>
 </div>

    <div>
        <label>Тема вопроса:</label><br>
        <select name='ques[topic]' class='ques' style='width:150px;'>
            <option></option>
            <option value='1'>Технический вопрос</option>
            <option value='2'>Вопрос по системе</option>
        </select>
    </div>
 
 <div class="right"> 
    <label for='ques'>Вопрос:</label> 
    <textarea style="height: 200px;" rows="7" cols="50" name="ques[ques]"></textarea> 
    <input type="hidden" value="<?php echo $welcome ?>" name="ques[visitor<?php $welcome ?>]">

    <input type="submit" value="Отправить" /> 
 </div> 
 </form> 
	</div>

<?php if($access_rights == 1): ?>
    <div style="margin-top: 20px;">
        <a href="admin__ques.php?id=1">Технические вопросы</a><br>
        <a href="admin__ques.php?id=2">Вопросы по системе</a>
    </div>
<?php endif ?>

<?php if($access_rights == 2): ?>
    <div style="margin-top: 20px;">
        <a href="output__ques.php?id=1">Технические вопросы</a><br>
        <a href="output__ques.php?id=2">Вопросы по системе</a>
    </div>
<?php endif ?>


</body>
</html>

<?php require '../parts_of_site/footer.php';?>