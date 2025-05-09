<!DOCTYPE html>
<html>
<head>
    <title>PHP Basics Demo</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f2f2f2; }
        h2 { color: #333; }
        .box { background: white; padding: 15px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<h2>PHP Basics Demonstration</h2>

<div class="box">
    <h3>1. Variables</h3>
    <?php
    $name = "Atharv";
    $age = 20;
    echo "Name: $name<br>Age: $age";
    ?>
</div>

<div class="box">
    <h3>2. If Condition</h3>
    <?php
    if ($age >= 18) {
        echo "$name is an adult.";
    } else {
        echo "$name is a minor.";
    }
    ?>
</div>

<div class="box">
    <h3>3. Loops (For loop)</h3>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "Number: $i<br>";
    }
    ?>
</div>

<div class="box">
    <h3>4. Arrays and Foreach Loop</h3>
    <?php
    $fruits = array("Apple", "Banana", "Orange","Mango");
    foreach ($fruits as $fruit) {
        echo "Fruit: $fruit<br>";
    }
    ?>
</div>

</body>
</html>
