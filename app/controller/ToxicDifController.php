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
        /*
         * added $riceBalls
         */
        if (isset($_POST ['plan']))
            $riceCakes = $_POST['plan'];
        else
            $riceCakes = NULL;
        if(isset($_POST['plan']))
            $riceBalls = $_POST['plan'];
        else
            $riceBalls = NULL;

        if ( (!$riceCakes) || (!$riceBalls) ) {
            return;
        }

        /*
         * added calculateDif function to 'Rice Button'
         */
        echo $this->toxicDifModel->getDataFromCourses($riceCakes);
        echo $this->toxicDifModel->calculateDif($riceBalls);
    }
}

?>