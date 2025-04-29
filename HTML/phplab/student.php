<?php
// Store student names in an array
$students = array("anvar", "yadhu", "melvin", "rithin", "gogul");

// Display the original array
echo "Original Array:";
print_r($students);
echo "<br/>";
echo "<br/>";

// Sort the array in ascending order using asort()
asort($students);
echo "Sorted Array in Ascending Order (asort):";
print_r($students);
echo "<br/>";
echo "<br/>";

// Sort the array in descending order using arsort()
arsort($students);
echo "Sorted Array in Descending Order (arsort):";
print_r($students);
echo "<br/>";
echo "<br/>";

?>
