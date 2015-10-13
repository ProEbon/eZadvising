<?php

require_once(__DIR__ . '/../model/PlanModel.php');

class PlanController
{
    private $planModel = NULL;

    public function __construct()
    {
        $planModel = new PlanModel();
    }

    public function handleRequests()
    {
        $this->handleCreatePlan();
    }

    private function handleCreatePlan()
    {
        if (isset($_POST['submit'])) {
            $this->planModel->createPlan();
        }

        if(empty($_GET) && empty($_POST))
        {
            session_start();
            $_SESSION['username'] = "crystal";
            $_SESSION['studentId'] = 1;
            $_SESSION['token'] = "ABC";

            include __DIR__."/../view/eatouch5.php";
        }
    }

}
?>