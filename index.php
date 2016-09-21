<?php
// include processing
require 'processing.php';

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
<body>
    <div id="password">
        <div><?php echo $password; ?></div>
    </div>
    <div id="controls">
        <form id="criteria_form">
            <label for="f_numwords">Number of words (max 9):</label>
            <input id="f_numwords" name="numwords" type="text" maxlength="1"><br>
            <label for="f_number">Include a number</label>
            <input id="f_number" name="includeNumber" type="checkbox" value="1"><br>
            <label for="f_symbol">Include a symbol</label>
            <input id="f_symbol" name="includeSymbol" type="checkbox" value="1"><br>
            <input type="submit" value="Generate">
        </form>
        <div id="message"><?php echo $message; ?></div>
    </div>
    <footer>
        <script src="js/scripts.js"></script>
    </footer>
</body>
</html>
