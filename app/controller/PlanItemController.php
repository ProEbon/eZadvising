<?php
require_once(__DIR__ . '/../model/PlanItemModel.php');

class PlanItemController {

    private $planItemModel = NULL;

    public function __construct() {
        $this->planItemModel = new PlanItemModel();
    }

    public function handleRequest() {
        $this->handleAddPlanItem();
        $this->handleMovePlanItem();
    }

    private function handleAddPlanItem() {
        if(isset($_POST ['courseId']))
            $courseId = $_POST['courseId'];
        else
            $courseId = NULL;

        if(isset($_POST['semesterCode']))
            $semesterCode = $_POST['semesterCode'];
        else
            $semesterCode = NULL;

        if(isset($_POST['planYear']))
            $planYear = $_POST['planYear'];
        else
            $planYear = NULL;

        if(isset($_POST['reqId']))
            $reqId = $_POST['reqId'];
        else
            $reqId = NULL;

        if(isset($_POST['proposedReqId']))
            $proposedReqId = $_POST['proposedReqId'];
        else
            $proposedReqId = NULL;

        if(isset($_POST['hours']))
            $hours = $_POST['hours'];
        else
            $hours = NULL;

        if(isset($_POST['programId']))
            $programId = $_POST['programId'];
        else
            $programId = NULL;

        if(isset($_POST['progYear']))
            $progYear = $_POST['progYear'];
        else
            $progYear = NULL;

        if(isset($_POST['plan']))
            $plan = $_POST['plan'];
        else
            $plan = NULL;

        if(!$courseId || !$semesterCode || !$planYear || /*!$reqId ||*/
            /*!$proposedReqId ||*/ !$hours || !$programId) {
            //echo '<script>alert(0);</script>';
            return;
        }

        echo $this->planItemModel->addPlanItem("ABC", 1, $courseId, $hours,
                                               $semesterCode, $planYear,
                                               $progYear, $programId,
                                               $reqId, $proposedReqId, $plan);
    }

    private function handleMovePlanItem() {
        if(isset($_POST ['groupId']))
            $groupId = $_POST['groupId'];
        else
            $groupId = NULL;

        if(isset($_POST['fromSem']))
            $fromSem = $_POST['fromSem'];
        else
            $fromSem = NULL;

        if(isset($_POST['fromYear']))
            $fromYear = $_POST['fromYear'];
        else
            $fromYear = NULL;

        if(isset($_POST['plan']))
            $plan = $_POST['plan'];
        else
            $plan = NULL;

        if(isset($_POST['toSem']))
            $toSem = $_POST['toSem'];
        else
            $toSem = NULL;

        if(isset($_POST['toYear']))
            $toYear = $_POST['toYear'];
        else
            $toYear = NULL;

        if(isset($_POST['studentId']))
            $studentId = $_POST['studentId'];
        else
            $studentId = NULL;

        if(!$groupId || !$fromSem || !$fromYear || /*!$plan ||*/
            !$toSem || !$toYear || !$studentId) {
            return;
        }

        echo $this->planItemModel->movePlanItem("ABC", $studentId, $groupId,
                                                $fromSem, $fromYear, $toSem,
                                                $toYear, $plan);
    }
}
?>