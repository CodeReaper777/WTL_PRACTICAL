<!DOCTYPE html>
<html>
<head>
    <title>PHP Arrays Demo</title>
    <style>
        body { font-family: Arial; background: #f8f9fa; padding: 30px; }
        .container {
            background: white; padding: 25px; border-radius: 10px;
            max-width: 700px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: #007bff; }
        .block {
            margin-bottom: 20px; padding: 15px; background: #eef; border-left: 5px solid #007bff;
        }
        code { background: #fff3cd; padding: 3px 5px; border-radius: 3px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Types of Arrays in PHP</h2>

    <div class="block">
        <strong>1. Indexed Array:</strong><br>
        <?php
        $colors = array("Red", "Green", "Blue");
        foreach ($colors as $color) {
            echo "- $color<br>";
        }
        echo "<pre>";
        print_r($colors);
        echo "</pre>";
        ?>
    </div>

    <div class="block">
        <strong>2. Associative Array:</strong><br>
        <?php
        $marks = array("John" => 85, "Alice" => 92, "Bob" => 78);
        foreach ($marks as $name => $score) {
            echo "$name scored <code>$score</code><br>";
        }
        echo "<pre>";
        print_r($marks);
        echo "</pre>";
        ?>
    </div>

    <div class="block">
        <strong>3. Multidimensional Array:</strong><br>
        <?php
        $students = array(
            array("Name" => "John", "Age" => 20, "Grade" => "A"),
            array("Name" => "Alice", "Age" => 22, "Grade" => "B"),
            array("Name" => "Bob", "Age" => 19, "Grade" => "A+")
        );
        foreach ($students as $student) {
            echo "Name: {$student['Name']}, Age: {$student['Age']}, Grade: {$student['Grade']}<br>";
        }
        echo "<pre>";
        print_r($students);
        echo "</pre>";
        ?>
    </div>
</div>

</body>
</html>
