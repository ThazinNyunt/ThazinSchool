<?php


class Actor {
    public $name;
    public $gender;
    public $awards;

    function __construct($name, $gender, $awards) {
        $this->name = $name;
        $this->gender = $gender;
        $this->awards = $awards;
    }
}

//$actor = new Actor("Nay Toe", "male", 3);
//echo $actor->name . "  " . $actor->awards;


$actors = [
    new Actor("Nay Toe", "male", 3),
    new Actor("Phway Phway", "female", 4)
];

for($i =0; $i < count($actors); $i++) {
    $actor = $actors[$i];
    echo $actor->name  . " " . $actor->gender;
    echo "<br/>";
}


