<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI-Calculator</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>🧮 BMI-Calculator</h2>
        <div>
            <label>Height(cm): </label>
            <input type="number" name="height">
        </div>
        <br>
        <div>
            <label>Weight(kg): </label>
            <input type="number" name="weight">
        </div>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    function calculate_bmi()
    {
        if (isset($_POST['submit'])) {
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $height_m = $height / 100;
            $bmi_calculate = $weight / ($height_m * $height_m);
            echo '<h3> Your BMI is:' . number_format($bmi_calculate, 2) . '</h3>';
            if ($bmi_calculate < 18.5) {
                echo '<h3>Thin</h3>';
            }
            elseif ($bmi_calculate < 25) {
                echo '<h3>Normal</h3>';
            }
            elseif ($bmi_calculate < 30) {
                echo '<h3>Overweight</h3>';
            }
            else {
                echo '<h3>Obese</h3>';
            }
        }
    }

    calculate_bmi();
    ?>
</body>

</html>