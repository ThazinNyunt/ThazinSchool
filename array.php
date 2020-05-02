<?php

class Week {
   var $number;
   var $sections = [];
   function __construct($number) {
       $this->number = $number;
   }
}

class Section {
    var $id;
    var $title;
    var $week_number;
    var $contents = [];

    function __construct($id, $title, $week_number) {
        $this->id = $id;
        $this->title = $title;
        $this->week_number = $week_number;
    }
}

class Content {
    var $id;
    var $section_id;

    function __construct($content_id,$section_id)
    {
        $this->id = $content_id;
        $this->section_id = $section_id;
    }
}


$rows = [
    ['id'=>1, 'week_number' => 1, 'section_id' => 1, 'section_title' => 'Section 1'],
    ['id'=>2, 'week_number' => 2, 'section_id' => 2, 'section_title' => 'Section 2'],
    ['id'=>3, 'week_number' => 2, 'section_id' => 3, 'section_title' => 'Section 3'],
    ['id'=>4, 'week_number' => 2, 'section_id' => 3, 'section_title' => 'Section 3']
];

print "<pre>";
print_r($rows);
print "</pre>";
print "<hr/>";

$weeks = [];
$sections = [];
$contents = [];

foreach($rows as $row) {
    $week_number = $row['week_number']; 
    $weeks[$week_number] = new Week($week_number);

    $section_id = $row['section_id']; 
    $section_title = $row['section_title']; 
    $sections[$section_id] = new Section($section_id, $section_title, $week_number);

    $content_id = $row['id'];
    $contents[$content_id] = new Content($content_id,$section_id);


}


foreach($sections as $section) {
    $week_number = $section->week_number;
    $week = $weeks[$week_number];
    $week->sections[] = $section;
}

foreach($contents as $content)
{
    $section_id = $content->section_id;
    $section = $sections[$section_id];
    $section ->content[] = $content;
}



print "<pre>";
print_r($weeks);
print "</pre>";
print "<hr/>";
print "<pre>";
print_r($sections);
print "</pre>";


?>