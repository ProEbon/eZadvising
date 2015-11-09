<?php
require_once(__DIR__ . '/../model/ToxicDifModel.php');

class ToxicDifController
{
    private $toxicDifModel = NULL;

    public function __construct()
    {
        $this->toxicDifModel = new ToxicDifModel();
    }

    public function handleRequest()
    {
        $this->handlePullCourseData();
    }

    public function handlePullCourseData()
    {
        if (isset($_POST ['plan']))
            $riceCakes = $_POST['plan'];
        else
            $riceCakes = NULL;

        if (!$riceCakes) {
            return;
        }

        echo $this->toxicDifModel->getDataFromCourses($riceCakes);
    }
}

?>