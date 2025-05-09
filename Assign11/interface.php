<?php

interface Shape {
    public function area();
}

class Circle implements Shape {
    public $radius;
    function __construct($r) {
        $this->radius = $r;
    }

    public function area() {
        return 3.14 * $this->radius * $this->radius;
    }
}
$circle = new Circle(5);
echo "Area of Circle: " . $circle->area() . "<br>";
?>