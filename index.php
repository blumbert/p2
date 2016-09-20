<?php
// include processing
require 'processing.php';

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <form>
        <label for="f_numwords">Number of words:</label>
        <input id="f_numwords" name="numwords" type="number" max="9" maxlength="1"><br>
        <label for="f_number">Include a number</label>
        <input id="f_number" name="includeNumber" type="checkbox" value="1"><br>
        <label for="f_symbol">Include a symbol</label>
        <input id="f_symbol" name="includeSymbol" type="checkbox" value="1"><br>
        <input type="submit" value="Generate">
    </form>
    <?php echo $message; ?>
</body>
</html>
