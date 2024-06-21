<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=[device-width], initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/app.css">
</head>
<body>
    <header>
        <h2>DC-Tracker</h2>
        <ul>
            <li><a href="/web-tech/index.php">Home</a></li>
            <li><a href="/web-tech/transaction.php">Transaction</a></li>
            <li><a href="./services/logout.php">Logout</a></li>
        </ul>
    </header>
    <main>
        <?php echo $content ?>
    </main>
</body>
</html>