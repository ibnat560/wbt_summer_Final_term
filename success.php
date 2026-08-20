<?php

// Receive values using $_GET
$applicant_id = $_GET["id"] ?? "";
$name = $_GET["name"] ?? "";
$cv_filename = $_GET["cv"] ?? "";


// Demonstrate $_REQUEST
// $_REQUEST can retrieve values sent through GET, POST, or COOKIE
$request_id = $_REQUEST["id"] ?? "";
$request_name = $_REQUEST["name"] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Successful</title>
</head>
<body>

<h2>=================================</h2>
<h2>APPLICATION SUCCESSFUL</h2>
<h2>=================================</h2>

<p>
    <strong>Applicant ID:</strong>
    <?php echo htmlspecialchars($applicant_id); ?>
</p>

<p>
    <strong>Name:</strong>
    <?php echo htmlspecialchars($name); ?>
</p>

<p>
    <strong>Email:</strong>
    Email was received during the application.
</p>

<p>
    <strong>Phone:</strong>
    Phone number was received during the application.
</p>

<p>
    <strong>Gender:</strong>
    Selected during application.
</p>

<p>
    <strong>Job Position:</strong>
    Selected during application.
</p>

<p>
    <strong>Qualification:</strong>
    Provided during application.
</p>

<p>
    <strong>Address:</strong>
    Provided during application.
</p>

<p>
    <strong>Uploaded CV:</strong>
    <?php echo htmlspecialchars($cv_filename); ?>
</p>

<p>
    <strong>Application submitted successfully.</strong>
</p>

</body>
</html>