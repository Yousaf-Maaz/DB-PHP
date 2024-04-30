<?php
$input = "A89C89";
$output = preg_replace('/89(?!.*89)/', '', $input);
echo "String after removing last occurrence of '89': " . $output;
?>
