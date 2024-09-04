<?php

class Person {

    public $name;
    public $age;
    public $gender;

    // Correct constructor method name and use $this instead of this
    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    // Correct method to use $this for property access
    public function display() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Gender: " . $this->gender . "<br>";
    }
}

// Create an object of the Person class
$person1 = new Person("Ram", 34, "male");

// Call the display method to show the person's details
$person1->display();

?>
