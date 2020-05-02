<?php

class FormField {
    var $name;
    var $label;
    var $type;
    function __construct($name, $label, $type) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
    }
}
