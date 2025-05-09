<!DOCTYPE html>
<html>
<head>
    <title>PHP Array Functions Demo</title>
    <style>
        body { font-family: Arial; background: #f0f8ff; padding: 20px; }
        .container {
            max-width: 800px; margin: auto; background: #fff; padding: 20px;
            border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: #007bff; }
        .block {
            margin-bottom: 20px; padding: 15px;
            background: #e9f7ef; border-left: 5px solid #28a745;
        }
        code { background: #f8d7da; padding: 3px 6px; border-radius: 3px; }
    </style>
</head>
<body>

<div class="container">
    <h2>PHP Array Functions (With Examples)</h2>

    <?php

    $fruits = ["Apple", "Banana", "Orange", "Mango", "Banana"];
    $numbers = [10, 20, 30, 40, 50];
    $assoc = ["name" => "John", "age" => 25, "city" => "Mumbai"];
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";
    echo '<div class="block"><strong>1. count()</strong><br>Total fruits: ' . count($fruits) . '</div>';

    echo '<div class="block"><strong>2. array_push()</strong><br>';
    array_push($fruits, "Grapes");
    echo 'After push: ' . implode(", ", $fruits) . '</div>';
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";
    
    echo '<div class="block"><strong>3. array_pop()</strong><br>';
    array_pop($fruits);
    echo 'After pop: ' . implode(", ", $fruits) . '</div>';
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";

    echo '<div class="block"><strong>4. array_shift()</strong><br>';
    array_shift($fruits);
    echo 'After shift: ' . implode(", ", $fruits) . '</div>';
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";

    echo '<div class="block"><strong>5. array_unshift()</strong><br>';
    array_unshift($fruits, "Kiwi");
    echo 'After unshift: ' . implode(", ", $fruits) . '</div>';
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";

    echo '<div class="block"><strong>6. in_array()</strong><br>';
    echo (in_array("Mango", $fruits)) ? "Mango is in the list." : "Mango not found.";
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";
    echo '</div>';

    echo '<div class="block"><strong>7. array_unique()</strong><br>';
    $unique = array_unique($fruits);
    echo 'Unique fruits: ' . implode(", ", $unique) . '</div>';
    echo "<pre>";
    print_r($fruits);
    echo "</pre>";
    
    echo "<pre>";
    print_r($numbers);
    echo "</pre>";
    echo '<div class="block"><strong>8. array_reverse()</strong><br>';
    $rev = array_reverse($numbers);
    echo 'Reversed: ' . implode(", ", $rev) . '</div>';
    echo "<pre>";
    print_r($numbers);
    echo "</pre>";

    echo "<pre>";
    print_r($assoc);
    echo "</pre>";
    echo '<div class="block"><strong>9. array_keys()</strong><br>';
    $keys = array_keys($assoc); 
    echo 'Keys: ' . implode(", ", $keys) . '</div>';
    
    echo '<div class="block"><strong>10. array_values()</strong><br>';
    $values = array_values($assoc);
    echo 'Values: ' . implode(", ", $values) . '</div>';
    ?>
</div>

</body>
</html>
