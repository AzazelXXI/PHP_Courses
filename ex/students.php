<!-- #1 -->

<!-- Build a simple PHP web page that:

Displays a list of students and their scores using a loop.

Calculates and displays the average score.

Uses a conditional to determine if each student passed (score ≥ 50) or failed. -->

<!-- Create one PHP file, e.g., students.php. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex1</title>
</head>
<body>
    <h1>Student Score Viewing</h1>

<?php

$students_name = [
    0 => 'Alice',
    1 => 'Jean',
    2 => 'Doe',
    3 => 'John',
    4 => 'Smith'
];

$total_score = 0;
$average_score = 0;

for ($i=0; $i < count($students_name); $i++) { 
    $score = rand(0, 100);
    $total_score = $total_score + $score;
    if ($score >= 50) {
        echo $students_name[$i] . '  -  ' . $score . '  -  ' . '<span style="color:green">Passed</span><br>';
    } 
    else {
        echo $students_name[$i] . '  -  ' . $score . '  -  ' . '<span style="color:red">Failed</span><br>';
    }
}

$average_score = $total_score / count($students_name);

echo '<br><br>';
echo 'Average Score = ' . $average_score;

?>
</body>
</html>

