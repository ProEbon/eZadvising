<?php
require_once(__DIR__."/../config/config.php");

class ToxicDifModel
{
    private $conn = NULL;

    public function __construct()
    {
        $this->conn = new PDO(DBCONNECTSTRING, DBUSER, DBPASSWORD);
    }

    public function calculateDif($riceBalls)
    {
        try
        {
            /*
             * working sql code
             *  -updates dif column in courses
             *  -with sum of multiple column values
             *
             */

            $sql = 'UPDATE courses
                    SET dif = courses.id +
                              courses.dr +
                              courses.fr';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':riceBalls', $riceBalls);

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
    public function getDataFromCourses($riceCakes)
    {
        try
        {
            /*
             * working sql code
             *  -COMPARES the courseId IN
             *  -course_records WITH the id
             *  -IN courses
             *      -change SELECT to whatever
             *      -you want
             */

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