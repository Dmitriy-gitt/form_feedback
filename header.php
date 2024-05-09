
<head>
<title>CMS Holister / <?php echo $sitename; ?></title>    
<link href="../css/css.css?a=<?php echo rand(1,9999); ?>" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href='https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css' rel='stylesheet'>
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'></script>
<!-- TinyMCE -->
<script type="text/javascript" src="//<?php echo $sitename; ?>/adminka/tiny/tiny_mce.js"></script>
<script type="text/javascript">
tinymce.init({
  selector: 'textarea',
  language: 'ru',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor moxiemanager',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code nonbreaking wordcount'
  ],
  toolbar1: 'code searchreplace | removeformat | undo redo | formatselect fontsizeselect',
  toolbar2: 'link unlink anchor visualchars insertfile image media | table | nonbreaking bold italic subscript superscript  forecolor backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
// URLs
	convert_urls : true,
	relative_urls : false,
	remove_script_host : true,
	document_base_url : '//<?php echo $sitename; ?>/',
  content_css: [
    '../css/css.css',
    '../adminpanel/css/noscroller.css'
	]
});
</script>
<!-- Fancybox -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<script type="text/javascript">
    $(document).ready(function() {
        $.fancybox.defaults.btnTpl.smallBtn = '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">' +
        '<svg viewBox="0 0 40 40">' +
        '<path d="M10,10 L30,30 M30,10 L10,30"></path>' +
        '</svg></button>';

        $('.fancybox').fancybox();
    });
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../js/jqueryui.custom.js"></script>
<link type="text/css" href="../../js/jqueryui.custom.css" rel="stylesheet" />
<!-- ЗАПРЕТ INPUT -->
<script type="text/javascript">
function onlyNumbers(input) {
    var value = input.value;
    var re = /\D/gi;
    if (re.test(value)) {
        value = value.replace(re, '');
        input.value = value;
    }
}
function onlyNumbersPlus(input) {
    var value = input.value;
    var re = /[^0-9- ]|/gi;
    if (re.test(value)) {
        value = value.replace(re, '');
        input.value = value;
    }
}
function onlyWeb(input) {
    var value = input.value;
    var re = /[^a-zA-Z0-9]|/gi;
    if (re.test(value)) {
        value = value.replace(re, '');
        input.value = value;
    }
}
function onlyPrice(input) {
    var value = input.value;
    var re = /[^0-9.]|/gi;
    if (re.test(value)) {
        value = value.replace(re, '');
        input.value = value;
    }
}
</script>
<!-- /ЗАПРЕТ INPUT -->
</head>
<body>
<div id="maket">
<div id="header_out" style="background-position:50% 10px;"><div id="header">
    <div id="menu">
    	<div class="menu menucurrent" style="text-transform:capitalize"><?php echo $sitename; ?></div>
        <div class="menu"><?php echo $welcome." <span class='gray'>[".$accessgroup[$access_rights]."]</span>" ?></div>
        <h4 class='leftarr' style='clear:left;'><a href='../login.php?logout'>&larr; выход</a> <span class='gray' style='font-size:14px;'>|</span> <a href='/' target="_blank">предпросмотр &rarr;</a></h4>
    </div>
	<div id="logotype">
    	<a href="/adminka"><img src="../pic/logocms.png" width="413" height="129"></a>
    </div>

</div></div>
<div id="content">
<div id="colomn">
<?php
if ($access_rights==1)
{
print "
<p>Глобальные  настройки:<br>
<a href='../user__new.php'><img class='button' src='../pic/add.png' title='Добавить' /></a>
<a href='../user__edit.php'><img class='button' src='../pic/edit.png' title='Редактировать' /></a>
<a href='../user__del.php'><img class='button' src='../pic/del.png' title='Удалить' /></a> Пользователи<br />
<a href='../constanta__edit.php'><img class='button' src='../pic/edit.png' title='Редактировать' /></a> Постоянные величины<br />
</p>
";
}
?>

<?php
if ($access_rights==1)
{
print '
<p>Статичные страницы:<br>
<a href="../webpages__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../webpages__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../webpages__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a>
</p>
';
}
?>

<?php
if ($access_rights==1 or $access_rights==2) {
print '
<p>Базы данных:<br>
<a href="../baza__add.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../baza__edit.php"><img class="button" src="../pic/view.png" title="Смотреть" /></a>
<a href="../recyclebin__edit.php"><img class="button" src="../pic/recyclebin.png" title="Просмотреть" /></a>  Документы<br />
';
}
if ($access_rights==1) {
print '
<a href="../cult__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../cult__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../cult__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Культуры<br />
';
}
if ($access_rights==1 or $access_rights==2) {
print '
<a href="../sort__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../sort__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../sort__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Сорта<br />
';
}
if ($access_rights==1) {
print '
<a href="../lab__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../lab__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../lab__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Лаборатории<br />
<a href="../organ__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../organ__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../organ__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Органы по серт-ии<br />

<a href="../expert__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../expert__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../expert__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Эксперты<br />

<a href="../country__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="#"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../country__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Страны<br />

<a href="../firma__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../firma__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../firma__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Организации<br />

<a href="../weeds__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../weeds__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../weeds__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Сорные растения<br />

<a href="../types_tests__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../types_tests__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../types_tests__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Виды испытаний<br />

<a href="../machine__new.php"><img class="button" src="../pic/add.png" title="Добавить" /></a>
<a href="../machine__edit.php"><img class="button" src="../pic/edit.png" title="Редактировать" /></a>
<a href="../machine__del.php"><img class="button" src="../pic/del.png" title="Удалить" /></a> Оборудование лаборатории<br />
';
}
if ($access_rights==1 or $access_rights==2) {
    print '
    <a href="feedback.php"><img class="button" src="../pic/control.png" title="Задать" /></a> Задать вопрос<br />
    ';
}
?>

</div>
<div id="text">