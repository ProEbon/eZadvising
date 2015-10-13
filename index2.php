<?php
require_once 'app/controller/PlanItemController2.php';
require_once 'app/controller/PlanController2.php';
require_once 'app/controller/StudentController2.php';
require_once 'app/controller/PlanTitleController2.php';

$planItemController = new PlanItemController();
$planItemController->handleRequest();

$planController = new PlanController();
$planController->handleRequests();

$studentController = new StudentController();
$studentController->handleRequest();

//$planTitleController = new PlanTitleController();
//$planTitleController->handleRequest();

?>