<?php
$input = "1,2,3,4,5,6,7";
$numbers = explode(",", $input);
$sum = array_sum($numbers);
echo "Sum of numbers: " . $sum;
?>
