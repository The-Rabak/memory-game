<?php
session_start();
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = '';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card Memory Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-wrapper">
    <div class="container">
        <div class="notifications">
            <div class="error">
                <p><?= $_SESSION['error'] ?></p>
            </div>
            <div class="timer">Timer:
                <div class="timerStamp"><span id="preMin">0</span><span id="minutes">0</span>:<span id="preSec">0</span><span
                            id="seconds">0</span></div>
            </div>
        </div>
        <div class="grid">
            <?php
            require_once "defaultLayout.php";
            ?>
        </div>
    </div>
    <div class="card-pick">
        <div class="lower-grid">Matches Found: <span id="matchCounter"></span></div>
        <div class="lower-grid">
            <a href='index.php'>Shuffle</a>
        </div>
        <div class="lower-grid">

            <form action="../api/api.php" method="post">
                <input type="text" name="term" placeholder="Enter New Image Search">
                <button type="submit" name="submit">submit</button>
            </form>
        </div>
    </div>
</div>
<div></div>


</body>
<script src="script.js"></script>
</html>
