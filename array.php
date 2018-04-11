<?php
$colour = array("white", "green", "red", "blue", "black");

//Uppgift 1-------------------------------------------------------------------------------------------

echo("The memory of that scene for me is like a frame of film forever frozen at that moment:
  the $colour[2] carpet, the $colour[1] lawn, the $colour[0] house, the leaden sky.
  The new president and his first lady.
  - Richard M. Nixon ");

//Uppgift 2-------------------------------------------------------------------------------------------

  $colour1 = array("white", "green", "red");

  foreach ($colour1 as $c){

    echo("$c \n");

  };

  sort($colour1);
  echo("<ul>");

  foreach($colour1 as $y){

    echo("<li> $y </li>");

  };
  echo("</ul>");

  //Uppgift 3-------------------------------------------------------------------------------------------

  $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen",
   "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin",
   "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid",
   "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius",
   "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta",
   "Austria" => "Vienna", "Poland"=>"Warsaw") ;
   asort($ceu);
   foreach($ceu as $country => $capital){
     echo("The Capital of $country is $capital ");
   };

   //Uppgift 4-------------------------------------------------------------------------------------------

   $x = array(1, 2, 3, 4, 5);
   var_dump($x);
   unset($x[3]);
   $x = array_value($x);
   echo "
   ";
   var_dump($x);
 ?>
