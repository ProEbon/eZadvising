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

    private function handlePullCourseData()
    {
        if (isset($_POST ['riceCakes']))
            $riceCakes = $_POST['riceCakes'];
        else
            $riceCakes = NULL;

        if (!$riceCakes) {
            return;
        }

        echo $this->toxicDifModel->getDataFromCourses($riceCakes);
    }
}

?>