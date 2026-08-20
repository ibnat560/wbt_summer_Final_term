<?php

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid Request!");
}

// Receive form data using $_POST
$applicant_id = trim($_POST["applicant_id"] ?? "");
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$password = $_POST["password"] ?? "";
$gender = $_POST["gender"] ?? "";
$job_position = $_POST["job_position"] ?? "";
$qualification = trim($_POST["qualification"] ?? "");
$address = trim($_POST["address"] ?? "");

$errors = array();


// ---------------- VALIDATION ----------------

// Applicant ID
if ($applicant_id == "") {
    $errors[] = "Applicant ID is required.";
}

// Name
if ($name == "") {
    $errors[] = "Name is required.";
}

// Email
if ($email == "") {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

// Phone
if ($phone == "") {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
    $errors[] = "Phone number must contain exactly 11 digits.";
}

// Password
if ($password == "") {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 6) {
    $errors[] = "Password must contain at least 6 characters.";
}

// Gender
if ($gender == "") {
    $errors[] = "Please select your gender.";
}

// Job Position
if ($job_position == "") {
    $errors[] = "Please select a job position.";
}

// Qualification
if ($qualification == "") {
    $errors[] = "Qualification is required.";
}

// Address
if ($address == "") {
    $errors[] = "Address is required.";
}


// ---------------- CV VALIDATION ----------------

if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] == UPLOAD_ERR_NO_FILE) {

    $errors[] = "Please upload your CV.";

} else {

    $cv = $_FILES["cv"];

    // Maximum size = 2 MB
    if ($cv["size"] > 2 * 1024 * 1024) {
        $errors[] = "CV file size must not exceed 2 MB.";
    }

    // Get file extension
    $file_name = $cv["name"];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Allowed extensions
    $allowed_extensions = array("pdf", "doc", "docx");

    if (!in_array($file_extension, $allowed_extensions)) {
        $errors[] = "Only PDF, DOC, and DOCX files are allowed.";
    }
}


// ---------------- SHOW ERRORS ----------------

if (count($errors) > 0) {

    echo "<h2>Application Failed!</h2>";

    foreach ($errors as $error) {
        echo $error . "<br>";
    }

    echo "<br><a href='index.php'>Go Back</a>";

    exit();
}


// ---------------- UPLOAD CV ----------------

$upload_folder = "uploads/";

// Create uploads folder if it does not exist
if (!is_dir($upload_folder)) {
    mkdir($upload_folder, 0777, true);
}

// Keep the original filename
$cv_filename = basename($cv["name"]);

$destination = $upload_folder . $cv_filename;

// Move uploaded file
if (!move_uploaded_file($cv["tmp_name"], $destination)) {
    die("Error uploading CV.");
}


// ---------------- SEND DATA USING GET ----------------

// urlencode() makes the values safe for use in a URL

$url = "result.php?"
     . "id=" . urlencode($applicant_id)
     . "&name=" . urlencode($name)
     . "&cv=" . urlencode($cv_filename);

header("Location: " . $url);
exit();

?>