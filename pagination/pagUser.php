<?php

if ( $page - 5 > 0 ) $page5left = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page - 5 ) . '">'.( $page - 5 ).'</a>';
if ( $page - 4 > 0 ) $page4left = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page - 4 ) . '">'.( $page - 4 ).'</a>';
if ( $page - 3 > 0 ) $page3left = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page - 3 ) . '">'.( $page - 3 ).'</a>';
if ( $page - 2 > 0 ) $page2left = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page - 2 ) . '">'.( $page - 2 ).'</a>';
if ( $page - 1 > 0 ) $page1left = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page - 1 ) . '">'.( $page - 1 ).'</a>';

if ( $page + 5 <= $total ) $page5right = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page + 5 ) . '">'.( $page + 5 ).'</a>';
if ( $page + 4 <= $total ) $page4right = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page + 4 ) . '">'.( $page + 4 ).'</a>';
if ( $page + 3 <= $total ) $page3right = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page + 3 ) . '">'.( $page + 3 ).'</a>';
if ( $page + 2 <= $total ) $page2right = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page + 2 ) . '">'.( $page + 2 ).'</a>';
if ( $page + 1 <= $total ) $page1right = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page + 1 ) . '">'.( $page + 1 ).'</a>';

// Проверяем нужны ли стрелки назад
if ( $page != 1 ) $pervpage = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=1"><i class="fa fa-angle-double-left"></i></a><a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page - 1 ) . '"><i class="fa fa-angle-left"></i></a>';
// Проверяем нужны ли стрелки вперед
if ( $page != $total ) $nextpage = '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . ( $page + 1 ) . '"><i class="fa fa-angle-right"></i></a><a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . $total . '"><i class="fa fa-angle-double-right"></i></a>';

// Находим две ближайшие станицы с обоих краев, если они есть
// Вывод меню если страниц больше одной
if ( $total > 1 ) {
    echo "<div id='pstrnav'>";
    echo $pervpage . ' ' . $page5leftpage4left . ' ' . $page3left . ' ' . $page2left . ' ' . $page1left . '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . $page . '" id="pstrnav_activ">&nbsp;[' . $page . ']</a>' . $page1right . ' ' . $page2right . ' ' . $page3right . ' ' . $page4right . ' ' . $page5right . '<a href="/adminka/feedback/output__ques.php?id='.$topic.'&page=' . $total . '"> [Всего стараниц ' . $total . ']</a>' . $nextpage;
    echo "</div>";
}