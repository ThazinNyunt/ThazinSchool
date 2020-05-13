<?php

class FormField {
    var $name;
    var $label;
    var $type;
    var $value;
    var $options;
    function __construct($name, $label, $type, $value = null, $options = []) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->options = $options;
    }
}

class Option {
    var $key;
    var $value;
    function __construct($key, $value) {
        $this->key = $key;
        $this->value = $value;
    }
}
