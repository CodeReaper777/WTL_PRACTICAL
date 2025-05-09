<?php

class A {
    public function greet() {
        echo "Hello from A<br>";
    }
}
class B extends A {
    public function greet() {
        echo "Hello from B<br>";
    }
}
$A = new A();
$B = new B();
$A->greet();
$B->greet();

echo "<br>";
?>