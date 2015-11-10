<?php
require_once(__DIR__."/../config/config.php");

class ToxicDifModel
{
    private $conn = NULL;

    public function __construct()
    {
        $this->conn = new PDO(DBCONNECTSTRING, DBUSER, DBPASSWORD);
    }

    public function getDataFromCourses($riceCakes)
    {
        try
        {

                $sql = 'SELECT title
                        FROM courses
                        JOIN course_records
                        ON course_records.courseId = courses.id';

                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(':riceCakes', $riceCakes);

                $stmt->execute();

                $result = $stmt->fetchAll();

                $jsonResult = json_encode($result);

                return $jsonResult;
        }
        catch(PDOException $e)
        {
            return 500;
        }

    }
}
?>