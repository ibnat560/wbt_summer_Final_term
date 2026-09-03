<?php
// Home_task_final: Commonly Used PHP Built-in Functions
// Each example is small and includes a comment explaining what the function does.

// 1. strlen() - Returns the length of a string.
$text = "Hello PHP";
echo strlen($text); // Output: 9


// 2. str_word_count() - Counts the number of words in a string.
$text = "PHP is easy";
echo str_word_count($text); // Output: 3


// 3. str_contains() - Checks whether a string contains a given substring.
$text = "I love PHP";
var_dump(str_contains($text, "PHP")); // Output: bool(true)


// 4. strpos() - Finds the position of the first occurrence of a substring.
$text = "Hello PHP";
echo strpos($text, "PHP"); // Output: 6


// 5. strtoupper() - Converts a string to uppercase.
echo strtoupper("hello"); // Output: HELLO


// 6. strtolower() - Converts a string to lowercase.
echo strtolower("HELLO"); // Output: hello


// 7. str_replace() - Replaces text with another text.
echo str_replace("World", "PHP", "Hello World"); // Output: Hello PHP


// 8. strrev() - Reverses a string.
echo strrev("Hello"); // Output: olleH


// 9. trim() - Removes whitespace from the beginning and end of a string.
$text = "  Hello  ";
echo trim($text); // Output: Hello


// 10. explode() - Splits a string into an array using a delimiter.
$fruits = "Apple,Banana,Mango";
print_r(explode(",", $fruits)); // Output: Array ( [0] => Apple [1] => Banana [2] => Mango )


// 11. implode() - Joins array elements into a string.
$fruits = ["Apple", "Banana", "Mango"];
echo implode(", ", $fruits); // Output: Apple, Banana, Mango


// 12. substr() - Returns a part of a string.
echo substr("Hello World", 0, 5); // Output: Hello


// 13. is_int() - Checks whether a value is an integer.
$value = 25;
var_dump(is_int($value)); // Output: bool(true)


// 14. is_float() - Checks whether a value is a floating-point number.
$value = 25.5;
var_dump(is_float($value)); // Output: bool(true)


// 15. is_nan() - Checks whether a value is Not-a-Number (NaN).
$value = acos(2);
var_dump(is_nan($value)); // Output: bool(true)


// 16. is_numeric() - Checks whether a value is a number or numeric string.
$value = "123";
var_dump(is_numeric($value)); // Output: bool(true)


// 17. round() - Rounds a floating-point number to the nearest integer.
echo round(4.6); // Output: 5


// 18. define() - Defines a named constant.
define("SITE_NAME", "My Website");
echo SITE_NAME; // Output: My Website


// 19. date() - Formats a date/time value.
echo date("Y-m-d"); // Example output: 2026-09-03


// 20. strtotime() - Converts a date/time string into a Unix timestamp.
$timestamp = strtotime("2026-12-25");
echo date("Y-m-d", $timestamp); // Output: 2026-12-25


// 21. time() - Returns the current Unix timestamp.
echo time(); // Example output: a Unix timestamp


// 22. date_default_timezone_set() - Sets the default timezone.
date_default_timezone_set("Asia/Dhaka");
echo date("Y-m-d H:i:s"); // Shows current Bangladesh date and time


// 23. date_default_timezone_get() - Returns the current default timezone.
echo date_default_timezone_get(); // Output: Asia/Dhaka


// 24. include - Includes and executes another PHP file.
// include "header.php";


// 25. require - Includes and executes another PHP file.
// If the file cannot be found, require causes a fatal error.
// require "config.php";


// 26. json_encode() - Converts a PHP value/array into a JSON string.
$data = ["name" => "Farah", "age" => 22];
$json = json_encode($data);
echo $json; // Output: {"name":"Farah","age":22}


// 27. json_decode() - Converts a JSON string into a PHP value/object.
$json = '{"name":"Farah","age":22}';
$data = json_decode($json, true);
print_r($data); // Output: Array ( [name] => Farah [age] => 22 )


// 28. array() - Creates an array.
$colors = array("Red", "Green", "Blue");
print_r($colors); // Creates and displays an indexed array


// 29. array_keys() - Returns all keys of an array.
$student = ["name" => "Farah", "age" => 22];
print_r(array_keys($student)); // Output: Array ( [0] => name [1] => age )


// 30. array_merge() - Merges two or more arrays.
$a = ["Apple", "Banana"];
$b = ["Mango", "Orange"];
print_r(array_merge($a, $b)); // Combines both arrays


// 31. array_push() - Adds one or more elements to the end of an array.
$fruits = ["Apple", "Banana"];
array_push($fruits, "Mango");
print_r($fruits); // Mango is added at the end


// 32. array_reverse() - Returns an array in reverse order.
$numbers = [1, 2, 3, 4];
print_r(array_reverse($numbers)); // Output: 4, 3, 2, 1


// 33. sizeof() - Returns the number of elements in an array.
// sizeof() is an alias of count().
$numbers = [10, 20, 30];
echo sizeof($numbers); // Output: 3


// 34. count() - Counts the number of elements in an array.
$numbers = [10, 20, 30];
echo count($numbers); // Output: 3


// 35. sort() - Sorts an array in ascending order.
$numbers = [30, 10, 20];
sort($numbers);
print_r($numbers); // Output: 10, 20, 30
?>
