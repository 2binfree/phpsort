<?php

require_once "Sort.php";

$max = 4000;
$data = Sort::generateArray($max);
Sort::bubbleSort1($data);
$data = Sort::generateArray($max);
Sort::bubbleSort2($data);
$data = Sort::generateArray($max);
Sort::bubbleSort3($data);
$data = Sort::generateArray($max);
Sort::oddEvenSort($data);
$data = Sort::generateArray($max);
Sort::combSort($data);


//Sort::displayArray($data);