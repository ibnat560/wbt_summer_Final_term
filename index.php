<?php
// Store student information using variables
$studentName = "Rahim Ahmed";
$studentID = "23-12345-1";
$foodChoice = 1; // 1 = Burger, 2 = Pizza, 3 = Sandwich, 4 = Coffee
$quantity = 6;

// Use switch-case to determine the food item and price
$foodItem = "";
$price = 0;

switch ($foodChoice) {
    case 1:
        $foodItem = "Burger";
        $price = 5;
        break;
    case 2:
        $foodItem = "Pizza";
        $price = 8;
        break;
    case 3:
        $foodItem = "Sandwich";
        $price = 4;
        break;
    case 4:
        $foodItem = "Coffee";
        $price = 3;
        break;
    default:
        $foodItem = "Invalid choice";
        $price = 0;
}

// Calculate total price
$subtotal = $price * $quantity;

// Use if-else to provide a discount
$discountPercent = 0;
if ($subtotal >= 30) {
    $discountPercent = 20;
} elseif ($subtotal >= 20) {
    $discountPercent = 10;
} else {
    $discountPercent = 0;
}

$discountAmount = ($subtotal * $discountPercent) / 100;
$finalBill = $subtotal - $discountAmount;

echo "================================<br>";
echo "UNIVERSITY CAFETERIA<br>";
echo "================================<br>";
echo "Student Name : " . $studentName . "<br>";
echo "Student ID : " . $studentID . "<br>";
echo "Food Item : " . $foodItem . "<br>";
echo "Price : $" . $price . "<br>";
echo "Quantity : " . $quantity . "<br>";
echo "Ordered Items:<br>";
for ($i = 1; $i <= $quantity; $i++) {
    echo "Item " . $i . ": " . $foodItem . "<br>";
}
echo "Subtotal : $" . $subtotal . "<br>";
echo "Discount : " . $discountPercent . "%<br>";
echo "Discount Amt : $" . $discountAmount . "<br>";
echo "Final Bill : $" . $finalBill . "<br>";
echo "Thank you for visiting!<br>";
echo "===============================<br>";
?>