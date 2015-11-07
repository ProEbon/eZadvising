<?php

require_once(__DIR__ . "/../config/config.php");

class PlanModel
{
    private $conn = NULL;

    public function __construct()
    {
        $this->conn = new PDO(DBCONNECTSTRING, DBUSER, DBPASSWORD);
    }

    public function createPlan($title, $plan, $color, $active)
    {
        try {
            $sql = 'INSERT INTO saved_plans' .
                '(title, plan, color, active)' .
                'VALUES (:title, :plan, :color, :active)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':plan', $plan);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':active', $active);

            $stmt->execute();
        } catch (PDOException $e) {
            return 500;
        }
    }

    public function reloadPlans($id)
    {
        try {
            $sql = 'SELECT title, color, active FROM saved_plans';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $result = $stmt->fetchAll();

            $jsonResult = json_encode($result);

            return $jsonResult;
        } catch (PDOException $e) {
            return 500;
        }
    }

    public function deletePlans($plan)
    {
        try {
            $sql = 'DELETE * FROM saved_plans WHERE plan = :plan';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':plan', $plan);

            $stmt->execute();
        } catch (PDOException $e) {
            return 500;
        }
    }

    public function updatePlanTitle($id, $newTitle)
    {
        try {
            $sql = 'UPDATE saved_plans SET title = :newTitle WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':newTitle', $newTitle);

            $stmt->execute();
        } catch (PDOException $e) {
            return 500;
        }
    }

    public function updateActiveTab($id, $currentActive)
    {
        try {
            $sql = 'UPDATE saved_plans SET active =: currentActive WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':currentActive', $currentActive);

            $stmt->execute();
        } catch (PDOException $e) {
            return 500;
        }
    }
}

?>