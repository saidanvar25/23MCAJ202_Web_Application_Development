<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<?php
// Define variables and error placeholders
$name = $email = $phone = $password = "";
$nError = $eError = $pError = $passError = "";

// Validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nError = "Name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty($_POST["email"])) {
        $eError = "Email is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", trim($_POST["email"]))) {
        $eError = "Invalid email format. Must include '@' and domain like .com.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    if (empty($_POST["phone"])) {
        $pError = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST["phone"])) {
        $pError = "Invalid phone number.";
    } else {
        $phone = htmlspecialchars(trim($_POST["phone"]));
    }

    if (empty($_POST["password"])) {
        $passError = "Password is required.";
    } elseif (strlen($_POST["password"]) < 6) {
        $passError = "Password must be at least 6 characters.";
    } else {
        $password = htmlspecialchars($_POST["password"]);
    }

    // If no errors, reset values and show success message
    if (empty($nError) && empty($eError) && empty($pError) && empty($passError)) {
        echo "<script>alert('Sign Up Successful!');</script>";
        $name = $email = $phone = $password = "";
    }
}
?>

<div class="container">
    <div class="heading">
        <h1>Sign In</h1>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="a">
            <label for="name">Name:</label>
            <input class="b" type="text" id="name" name="name" placeholder="Enter name..." value="<?php echo $name; ?>">
            <span class="error"><?php echo $nError; ?></span>
        </div>
        
        <div class="a">
            <label for="email">Email:</label>
            <input class="b" type="text" id="email" name="email" placeholder="Enter email..." value="<?php echo $email; ?>">
            <span class="error"><?php echo $eError; ?></span>
        </div>
        
        <div class="a">
            <label for="phone">Phone Number:</label>
            <input class="b" type="tel" id="phone" name="phone" placeholder="Enter phone number..." value="<?php echo $phone; ?>">
            <span class="error"><?php echo $pError; ?></span>
        </div>

        <div class="a">
            <label for="password">Password:</label>
            <input class="b" type="password" id="password" name="password" placeholder="Enter password...">
            <span class="error"><?php echo $passError; ?></span>
        </div>

        <button class="submitbutton" type="submit">Sign Up</button>
    </form>
</div>
</body>
</html>
