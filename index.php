<?php
/**
 * Created by PhpStorm.
 * User: Gusya
 * Date: 22.10.2019
 * Time: 22:07
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once "./vendor/autoload.php";
/*
use App\component\AvailableActions;


$a = new AvailableActions(12,13,"Новое", 12);
echo " исполнитель  для статуса новое " . $a->getAvailableAction();


$a = new AvailableActions(12,13,"Новое", 13);
echo " заказчик для статуса новое "  . $a->getAvailableAction();

$a = new AvailableActions(12,13,"В работе", 12);
echo " исполнитель для статуса в работе " . $a->getAvailableAction();

$a = new AvailableActions(12,13,"В работе", 13);
echo " заказчик для статуса в работе " . $a->getAvailableAction();

$a = new AvailableActions(12,13,"Выполнено", 13);
echo " заказчик для статуса выполнено " . $a->getAvailableAction();
*/

use App\sqlData\ConvertCsvToSql;
$tables = ['tasks', 'users', 'categories', 'cities', 'response', 'user_role', 'statuses'];
$filePath = realpath("./data/");

foreach ($tables as $table){
    $a = new ConvertCsvToSql($table.'.csv',$table);
    $sql = $a->getSql();
    file_put_contents($filePath."/tab_".$table.".sql", $sql,FILE_APPEND | LOCK_EX);
}
