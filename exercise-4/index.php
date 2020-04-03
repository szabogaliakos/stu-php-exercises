<?php
    require_once "Student.php";
    Student::LoadStudentsFromXml("resources/students.xml");
    usort(Student::$students, function ($a, $b) { return $a->getScores()["PHP"] - $b->getScores()['PHP']; });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Class</th>
            <th>CSS score</th>
            <th>PHP score</th>
            <th>Java score</th>
        </tr>
        <?php
            foreach (Student::$students as $student){
                echo $student;
            }
        ?>
    </table>
    <label>Highest score in CSS:</label>
    <label>
        <b>
            <?php
                echo Student::getHighestScore("PHP")->getName();
            ?>
        </b>
    </label>
</body>
</html>