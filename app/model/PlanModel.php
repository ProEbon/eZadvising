<?php

class PlanModel
{
    private $conn = NULL;

    public function __construct()
    {
        $this->conn = new PDO(DBCONNECTSTRING, DBUSER, DBPASSWORD);
    }

    public function createPlan()
    {
        $errormsg = "";
        $showform = 1;

            // Cleanse title on submission
            $formfield['title'] = htmlspecialcharacters(stripslashes(trim($_POST['title'])));

            // Check if title name is empty
            if (empty($formfield['title'])) {
                $errormsg .= "<p>Title is empty</p>";
            }

            // Check for duplicate title
            if ($formfield['title'] != $_POST['origtitle']) {
                try {
                    // Pulls titles from the database & binds value to variable to be used
                    $sqltitle = 'SELECT * FROM '.DBNAME.' WHERE title = :title';
                    $stmttitle = $this->conn->prepare($sqltitle);
                    $stmttitle->bindValue(':title', $formfield['title']);
                    $stmttitle->execute();
                    $count = $stmttitle->rowCount();

                   //fix counttitle not declared???
                   // if ($counttitle > 0) {
                   //     $errormsg .= "<p>Duplicate plan name.</p>";
                   // }
                } catch (PDOException $e) {
                    echo 'Unable to fetch title to check for existing. <br />ERROR: <br />' . $e->getMessage();
                    exit();
                }
            }

            // Update if no errors exist
            if ($errormsg != "") {
                echo $errormsg;
                echo "<p>Try again.</p>";
            } else {
                try {
                    // Insert data into database
                    $sqlupdate = 'UPDATE '.DBNAME.' SET title = :title WHERE ID = :ID';
                    $stmtupdate = $this->conn->prepare($sqlupdate);
                    $stmtupdate->bindValue(':title', $formfield['title']);
                    $stmtupdate->bindValue(':ID', $_POST['x']);
                    $stmtupdate->execute();

                    // Hide form
                    $showform = 0;
                } catch (PDOException $e) {
                    echo 'Error updating title <br />ERROR: <br />' . $e->getMessage();
                    exit();
                }
            }

            if ($showform == 1) {
                try {
                    // Pull data from database for existing plans
                    $sql = 'SELECT * FROM '.DBNAME.' WHERE ID = :ID';

                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindValue(':ID', $_GET['x']);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    ?>
                    <!-- Form for changing plan title -->
                    <form action="#" id="titleForm" method="post" name="titleForm">
                        <input id="titleName" name="name" placeholder="Name" type="text">
                        <input type="submit" id="changeTitle" onclick="titleSubmit();" value="Submit">
                    </form>
                    <!-- End form -->
                    <?php
                } catch (PDOException $e) {
                    echo 'Error fetching plans. <br />ERROR: </br>' . $e->getMessage();
                    exit();
                }
            }
        }
    }
?>