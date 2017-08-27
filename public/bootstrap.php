<?php
// include all external lib in vendor, class in controller route and model, config for database

//--- BOOTSTRAP
require_once '../vendor/autoload.php';//--- ./vendor/autoload.php in order to include namsepace class
use Phpdudimanche\Rest\Model\Issues as MdlIssues;
use Phpdudimanche\Rest\Controller\Issues as CtrlIssues;//--- do not forget to do (composer update in ssh) in order to update autoload from json

//-- MODEL // Model/Issues : one class, multiple methods (with PDO)
$model=new MdlIssues();

//--- CONTROLLER (with regex or pure php) authorize any format ? // Controller/Issues : one class, one method (construct) // or muliple methods and one contruct which executes each method
$issues=new CtrlIssues($model);// DependencyInjection : $model instance with root (no more need to include in Controller, but not modular because complete namespace)
header('Content-Type: application/json;charset=UTF-8');
echo '{"msg":"error"}';// display only if no die('something') or exit()
?>