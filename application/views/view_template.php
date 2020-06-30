<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $page_title; ?></title>
<style>
   table {
    background: green; /* Цвет фона таблицы */
    color: white; /* Цвет текста */
    border-spacing: 1px; /* Расстояние между ячейками */
   }
   th {
    background: green; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
   }
   td {
    background: green; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
   }
</style>
</head>
<body bgcolor="green">
<header style="background: green; color: white"><h1 align="center">Игра Блэкджек</h1>
<h2 align="center"><b><a style="color: white" href="/cards/start/">Начать новую игру</a></h2>
</header>
<?php
include 'application/views/'.$view_content;
?>
</body>
</html>