<?php

class FormField {
    var $name;
    var $label;
    var $type;
    var $value;
    function __construct($name, $label, $type, $value = null) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
    }
}
