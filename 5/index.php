<?php
include 'mysql.php';
$php = "SELECT * FROM `course` WHERE `name` = 'php'";
if($result = $conn->query($php)){
    foreach ($result as $row) $c_id = $row['course_id'];
}

$sql = "SELECT * FROM `history` WHERE `course_id` = '$c_id' AND `status` = '1' AND `end` < TIMESTAMP(CURRENT_TIMESTAMP)";
if($res = $conn->query($sql)){
    $i = 0;
    $count = 0;
    foreach ($res as $row1) {
        $trainee_id = $row1['trainee_id'];
        $course_id = $row1['course_id'];
        $getTraineeData = "SELECT * FROM `trainee` WHERE `trainee_id` = '$trainee_id'";
        $getCourseData = "SELECT `name` FROM `course` WHERE `course_id` = '$course_id'";
        $allCoursesData = "SELECT * FROM `history` WHERE `status` = '1' AND `start` > '1630432800'";
        if(
            $resToGetTrainee = $conn->query($getTraineeData)
            AND
            $resToGetCourse = $conn->query($getCourseData)
        ) {
            foreach ($resToGetTrainee as $row2) {
                echo  ' | Name: ' . $row2["name"];
                echo ' | Email: ' . $row2["email"];
            }
            foreach ($resToGetCourse as $row3){
                echo ' | Course: ' . $row3['name'] . '<br>';
            }
        }
    }
    $j = 0;
    $resAllCourse = $conn->query($allCoursesData);
    foreach ($resAllCourse as $row4){
        $count += $row4['status'];
        $success_courses = $row4['course_id'];
        $countCourses = "SELECT COUNT(1) FROM `history` WHERE `course_id` = '$success_courses' AND `status` = '1' AND `start` > '1630432800'";
        $getCount = $conn->query($countCourses);
        foreach ($getCount as $row6 => $val) {
            $num = $val['COUNT(1)'];
        }
        $getSuccessCoursesName = "SELECT `name` FROM `course` WHERE `course_id` = '$success_courses'";
        if($req = $conn->query($getSuccessCoursesName)){
            foreach ($req as $row5){
                $unsorted_name[] = $row5['name'];
                $sortedArray = array_unique($unsorted_name);
                if($sortedArray[$j] != '') echo 'Завершенный за этот месяц раз (' . ($num) . ') курс - ' . $sortedArray[$j]. '<br>';
            }
        }
        $j++;
    }
    echo 'Количество успешно завершенных курсов (в этом месяце всего): '.$count;
}

echo '<br> File Database SQL: <a href="db.sql">Link</a>';