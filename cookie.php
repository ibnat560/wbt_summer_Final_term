<?php
session_start();

$errors = [];
$name = $student_id = $email = $department = '';
$success = '';
$deleted = false;

// Handle Clear Cookie action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
    setcookie('student_name', '', time() - 3600, '/');
    setcookie('student_id', '', time() - 3600, '/');
    // Also unset from $_COOKIE for immediate effect in this request
    unset($_COOKIE['student_name']);
    unset($_COOKIE['student_id']);
    $deleted = true;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? '');
    $student_id = trim($_POST['student_id'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Student Name validation
    if ($name === '') {
        $errors['name'] = 'Student Name is required.';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $errors['name'] = 'Student Name should contain only letters and spaces.';
    }

    // Student ID validation
    if ($student_id === '') {
        $errors['student_id'] = 'Student ID is required.';
    } elseif (strlen($student_id) < 4) {
        $errors['student_id'] = 'Student ID must contain at least 4 characters.';
    }

    // Email validation
    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    // Department validation
    if ($department === '' ) {
        $errors['department'] = 'Please select a department.';
    }

    // Password validation
    if ($password === '') {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must contain at least 6 characters.';
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    // If no errors, set cookies for 1 hour
    if (empty($errors)) {
        setcookie('student_name', $name, time() + 3600, '/');
        setcookie('student_id', $student_id, time() + 3600, '/');
        // Provide immediate feedback (cookies available on next request normally)
        $success = 'Information validated and cookies set for 1 hour.';
    }
}

function old($val)
{
    return htmlspecialchars($val ?? '', ENT_QUOTES);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Student Registration</title>
    <style>
        body{font-family:Arial,Helvetica,sans-serif;max-width:720px;margin:20px auto;padding:0 16px}
        .error{color:#b00020}
        .success{color:green}
        label{display:block;margin-top:10px}
        input,select{padding:8px;width:100%;box-sizing:border-box;margin-top:4px}
        .row{display:flex;gap:8px}
        .row > div{flex:1}
        .buttons{margin-top:12px}
    </style>
</head>
<body>

<?php
// Display cookie info or messages
if ($deleted) {
    echo '<p class="success">Cookie deleted successfully.</p>';
} elseif ($success !== '') {
    echo '<p class="success">' . $success . '</p>';
}

if (!empty($_COOKIE['student_name']) && !empty($_COOKIE['student_id'])) {
    echo '<h2>Welcome Back!</h2>';
    echo '<p>Student Name: ' . htmlspecialchars($_COOKIE['student_name'], ENT_QUOTES) . '</p>';
    echo '<p>Student ID: ' . htmlspecialchars($_COOKIE['student_id'], ENT_QUOTES) . '</p>';
} elseif ($success !== '' && empty($_COOKIE['student_name']) && empty($_COOKIE['student_id'])) {
    // Cookies were just set this request — show the values used to set them
    if (!empty($name) && !empty($student_id)) {
        echo '<h2>Welcome Back!</h2>';
        echo '<p>Student Name: ' . htmlspecialchars($name, ENT_QUOTES) . '</p>';
        echo '<p>Student ID: ' . htmlspecialchars($student_id, ENT_QUOTES) . '</p>';
    }
} else {
    echo '<p>No saved student information found.</p>';
}

?>

<h1>Student Registration Form</h1>
<form method="post" action="">
    <label>Student Name
        <input type="text" name="name" value="<?php echo old($name); ?>">
        <?php if (!empty($errors['name'])) echo '<div class="error">' . $errors['name'] . '</div>'; ?>
    </label>

    <label>Student ID
        <input type="text" name="student_id" value="<?php echo old($student_id); ?>">
        <?php if (!empty($errors['student_id'])) echo '<div class="error">' . $errors['student_id'] . '</div>'; ?>
    </label>

    <label>Email
        <input type="email" name="email" value="<?php echo old($email); ?>">
        <?php if (!empty($errors['email'])) echo '<div class="error">' . $errors['email'] . '</div>'; ?>
    </label>

    <label>Department
        <select name="department">
            <option value="">-- Select Department --</option>
            <option value="CSE" <?php if ($department === 'CSE') echo 'selected'; ?>>CSE</option>
            <option value="EEE" <?php if ($department === 'EEE') echo 'selected'; ?>>EEE</option>
            <option value="BBA" <?php if ($department === 'BBA') echo 'selected'; ?>>BBA</option>
            <option value="ENG" <?php if ($department === 'ENG') echo 'selected'; ?>>English</option>
        </select>
        <?php if (!empty($errors['department'])) echo '<div class="error">' . $errors['department'] . '</div>'; ?>
    </label>

    <div class="row">
        <div>
            <label>Password
                <input type="password" name="password">
                <?php if (!empty($errors['password'])) echo '<div class="error">' . $errors['password'] . '</div>'; ?>
            </label>
        </div>
        <div>
            <label>Confirm Password
                <input type="password" name="confirm_password">
                <?php if (!empty($errors['confirm_password'])) echo '<div class="error">' . $errors['confirm_password'] . '</div>'; ?>
            </label>
        </div>
    </div>

    <div class="buttons">
        <button type="submit" name="submit">Submit</button>
    </div>
</form>

<form method="post" action="" style="margin-top:10px">
    <button type="submit" name="clear">Clear Cookie</button>
</form>

</body>
</html>
