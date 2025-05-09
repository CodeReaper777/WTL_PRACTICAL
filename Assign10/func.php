<!DOCTYPE html>
<html>
<head>
    <title>PHP Functions Demo</title>
    <style>
        body { font-family: Arial; background: #f4f8fb; padding: 30px; }
        .container {
            max-width: 750px; margin: auto; background: #fff; padding: 25px;
            border-radius: 10px; box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h2 { color: #0077cc; }
        .block {
            margin-bottom: 20px; padding: 15px; background: #e6f2ff;
            border-left: 6px solid #0077cc;
        }
        code { background: #fff3cd; padding: 3px 6px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>PHP Functions Explained with Examples</h2>

    <?php
    // 1. Basic function without parameters
    function greet() {
        echo '<div class="block"><strong>1. greet()</strong><br>Hello, welcome to PHP functions!</div>';
    }
    greet();

    // 2. Function with one parameter
    function square($n) {
        return $n * $n;
    }
    echo '<div class="block"><strong>2. square(4)</strong><br>Square of 4 is: ' . square(4) . '</div>';

    // 3. Function with multiple parameters
    function add($a, $b) {
        return $a + $b;
    }
    echo '<div class="block"><strong>3. add(10, 20)</strong><br>10 + 20 = ' . add(10, 20) . '</div>';

    // Function with default parameter
    function welcome($name = "Guest") {
        return "Welcome, $name!";
    }
    echo '<div class="block"><strong>4. welcome()</strong><br>' . welcome() . '</div>';
    echo '<div class="block"><strong>4. welcome("Alice")</strong><br>' . welcome("Alice") . '</div>';

    // 5. Function returning multiple values using array
    function calculate($x, $y) {
        return array(
            "sum" => $x + $y,
            "diff" => $x - $y,
            "prod" => $x * $y
        );
    }
    $results = calculate(5, 2);
    echo '<div class="block"><strong>5. calculate(5, 2)</strong><br>';
    echo "Sum: {$results['sum']}, Difference: {$results['diff']}, Product: {$results['prod']}</div>";

    // 6. Recursive Function: factorial
    function factorial($n) {
        if ($n <= 1) return 1;
        return $n * factorial($n - 1);
    }
    echo '<div class="block"><strong>6. factorial(5)</strong><br>Factorial of 5 is: ' . factorial(5) . '</div>';

    // 7. Function using array as input
    function printItems($items) {
        $output = "";
        foreach ($items as $item) {
            $output .= "$item, ";
        }
        return rtrim($output, ", ");
    }
    echo '<div class="block"><strong>7. printItems(["Pen", "Book", "Mouse"])</strong><br>';
    echo printItems(["Pen", "Book", "Mouse"]) . '</div>';

    ?>
</div>

</body>
</html>
