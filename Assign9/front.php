<?php
$sumResult = $factorialResult = $maxResult = $gradeResult = "";

function factorial($n) {
    return ($n <= 1) ? 1 : $n * factorial($n - 1);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sum
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $sumResult = $a + $b + $c;

    // Factorial
    $n = $_POST['fact'];
    $factorialResult = factorial($n);

    // Max
    $x = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    $maxResult = max($x, $y, $z);

    // Grade
    $score = $_POST['score'];
    if ($score >= 75) {
        $gradeResult = "Distinction";
    } elseif ($score >= 60) {
        $gradeResult = "First Class";
    } else {
        $gradeResult = "Needs Improvement";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Input Demo</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .container {
            background: white; padding: 25px; border-radius: 10px;
            max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="number"] {
            padding: 8px; width: 80px; margin-right: 10px;
        }
        label, .block { display: block; margin: 10px 0; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .output { background: #eef; padding: 10px; border-left: 5px solid #007bff; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>PHP with User Input</h2>
    <form method="post">
        <label>Add Three Numbers:</label>
        <input type="number" name="a" required>
        <input type="number" name="b" required>
        <input type="number" name="c" required>

        <label>Enter a number to get Factorial:</label>
        <input type="number" name="fact" required>

        <label>Enter Three Numbers to Find Greatest:</label>
        <input type="number" name="x" required>
        <input type="number" name="y" required>
        <input type="number" name="z" required>

        <label>Enter Score to Get Grade:</label>
        <input type="number" name="score" required>

        <br><br>
        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <div class="output">
        <strong>Sum:</strong> <?php echo $sumResult; ?><br>
        <strong>Factorial:</strong> <?php echo $factorialResult; ?><br>
        <strong>Greatest:</strong> <?php echo $maxResult; ?><br>
        <strong>Grade:</strong> <?php echo $gradeResult; ?>
    </div>
    <?php endif; ?>
</div>

</body>
</html>
