<?php
$MyArray = array("Thing", "Cool", "Ultra", "PPPPPPP", "guh", "nah");

echo $MyArray[5];

$MyArray[5] = "Kewl";

echo $MyArray[5];

unset($MyArray[5]);

foreach($MyArray as $lang){
  print "<p> $lang </p>"
};
 ?>
