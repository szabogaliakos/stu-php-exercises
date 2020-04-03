<?php

class Student
{
    public static $students = array();

    private $name;
    private $class;
    private $scores;

    public function getName()
    {
        return $this->name;
    }

    public function getScores()
    {
        return $this->scores;
    }

    public function __construct($name, $class, $scores)
    {
        $this->name = $name;
        $this->class = $class;
        $this->scores = $scores;
    }

    public static function LoadStudentsFromXml($path){
        $xml=simplexml_load_file("resources/students.xml") or die("Error: Cannot create object");
        foreach ($xml->children() as $studentNode){
            $name = $studentNode->name;
            $class = $studentNode->class;
            $scoreNodes = $studentNode->scores->children();
            $scores = array(
                strval($scoreNodes[0]['name']) => intval($scoreNodes[0]),
                strval($scoreNodes[1]['name']) => intval($scoreNodes[1]),
                strval($scoreNodes[2]['name']) => intval($scoreNodes[2])
            );
            array_push(Student::$students, new Student($name, $class, $scores));
        }
    }

    public static function getHighestScore($name){
        $highestScoreStudent = Student::$students[0];
        foreach (Student::$students as $student){
            if ((int)$highestScoreStudent->getScores()[$name] < (int)$student->getScores()[$name]){

                $highestScoreStudent = $student;
            }
        }
        return $highestScoreStudent;
    }

    public function __toString()
    {
        $studentRow = "<tr>";
        $studentRow = "<td>".$this->name."</td>";
        $studentRow .= "<td>".$this->class."</td>";
        $studentRow .= "<td>".$this->scores["CSS"]."</td>";
        $studentRow .= "<td>".$this->scores["PHP"]."</td>";
        $studentRow .= "<td>".$this->scores["Java"]."</td>";
        $studentRow .= "</tr>";
        return $studentRow;
    }
}