<!DOCTYPE html>
<html>
<head>
    <title>PHP OOP Demo</title>
    <style>
        body { font-family: Arial, background: #f0f7ff; padding: 30px; }
        .container {
            max-width: 800px; margin: auto; background: white; padding: 25px;
            border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: #005fa3; }
        .card {
            background: #e9f4ff; padding: 15px; margin-bottom: 15px;
            border-left: 6px solid #007acc;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>OOP in PHP - Simple Example</h2>

    <?php
    // CLASS
    class Person {
        // PROPERTIES
        public $name;
        public $age;

        // CONSTRUCTOR
        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        // METHOD
        public function greet() {
            return "Hello, my name is {$this->name} and I am {$this->age} years old.";
        }
    }

    // OBJECT CREATION
    $person1 = new Person("Rahul", 22);
    $person2 = new Person("Jyoti", 30);

    echo '<div class="card"><strong>1. Person Class</strong><br>' . $person1->greet() . '</div>';
    echo '<div class="card">' . $person2->greet() . '</div>';

    // INHERITANCE
    class Student extends Person {
        public $course;

        public function __construct($name, $age, $course) {
            parent::__construct($name, $age);
            $this->course = $course;
        }

        public function details() {
            return "{$this->name} is studying {$this->course}.";
        }
    }

    $student1 = new Student("Atharv", 19, "Cybersecurity");
    echo '<div class="card"><strong>2. Inheritance</strong><br>' . $student1->greet() . '<br>' . $student1->details() . '</div>';

    // ENCAPSULATION
    class BankAccount {
        private $balance = 0;

        public function deposit($amount) {
            if ($amount > 0) {
                $this->balance += $amount;
            }
        }

        public function getBalance() {
            return "Your current balance is ₹" . $this->balance;
        }
    }

    $account = new BankAccount();
    $account->deposit(5000);
    $account->deposit(2500);

    echo '<div class="card"><strong>3. Encapsulation (BankAccount)</strong><br>' . $account->getBalance() . '</div>';
    ?>
</div>
</body>
</html>
