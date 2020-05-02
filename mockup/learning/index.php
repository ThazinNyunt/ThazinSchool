<?php
    function sum_from_to($start, $end) {
        $sum = 0;
        for ($i = $start; $i <= $end ; $i++) 
        {       
            $sum = $sum + $i;
        }
        return $sum;
    }

    function get_a_single_name() {
        $all_alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $vowels = ['a','e','i','o','u'];

        $numberOfWords = rand(2, 4);
        //$r=$number[rand(0,count($number)-1)];
        $result="";
        for($i=0; $i< $numberOfWords; $i++) {
            if($i != 1) {
                $c = $all_alphabets[rand(0, count($all_alphabets)-1)];
                if($i==0) {
                    $result = $result . strtoupper($c);                   
                }
                else {
                    $result = $result . $c;
                }      
            } 
            else {
                $result=$result . $vowels[rand(0, count($vowels)-1)];
            }                   
        }
        return $result;   
    }
 
    function get_full_name() {

        $numberOfChars = rand(2, 4);
        $result2="";
        for($j=0; $j< $numberOfChars; $j++) {
            $result2= $result2 . " " . get_a_single_name();           
        }
        return $result2;        
    }

    function get_full_name_array($count) {
        $names = [];
        for($i=0; $i < $count; $i++) {
            $names[] = get_full_name();
        }
        return $names;
    }

    $actors = get_full_name_array(10);
   
    for($i = 1 ; $i <=count($actors); $i++ )
    {
        echo $actors[count($actors)-$i]."<br/>";
    }
    /*$name = get_full_name();

    echo "<h1>". $name . "</h1>";
    echo $name."<br/>";
    echo $name;*/
    //echo rand(2, 4);

    //echo sum_from_to(1, 5);
    //echo "<br/>";
    //echo sum_from_to(1,100);

?>