<?php
$list = "";

// get list of words (from paulnoll.com) if the words.txt file doesnt exist
if (!file_exists("words.txt")) {
    for ($i = 1; $i < 30; $i+=2) {
        // form the current url
        $url = "http://www.paulnoll.com/Books/Clear-English/words-" . sprintf('%02d', $i) . "-" . sprintf('%02d', ($i+1)) . "-hundred.html";

        // get the html from the url
        $wordshtml = file_get_contents($url);

        // create new DOMDocument instance
        $doc = new DOMDocument();
        // load html into DOMDocument
        $doc->loadHTML($wordshtml);
        // parse out all the "<li> tags" and add them to the word list
        $wordtags = $doc->getElementsByTagName("li");
        for ($j = 0; $j < $wordtags->length; $j++) {
            $list .= trim($wordtags->item($j)->nodeValue) . PHP_EOL;
        }
    }

    // write list to 'words.txt' file
    $listFile = fopen("words.txt", "w");
    fwrite($listFile, rtrim($list, PHP_EOL));
}
// define list of symbols
$symbols = array("~","!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "+",
                 "-", "=", "{", "}", "[", "]", "|", "\\", "<", ">", "?");

//initialize message variable
$message = "";

// default number of words to 4
$numWords = 4;

// validate input
if (isset($_GET["numwords"])) {
    if (!is_numeric($_GET["numwords"])  || $_GET["numwords"] > 9)
        $message = "Invalid number given. Defaulted to 4.";
    else {
        $numWords = $_GET["numwords"];
    }
}

// get contents of words text file
$wordsText = file_get_contents('words.txt');

// get words as an array
$wordsArray = explode(PHP_EOL, $wordsText);

// get array keys of random words
$keys = array_rand($wordsArray, $numWords);
if (!is_array($keys))
    $keys = array($keys);

// initialize password variable
$passwordArray = array();

// form list of words
foreach($keys as $key) {
    array_push($passwordArray, $wordsArray[$key]);
}

// get password with words separated by a '-'
$password = implode("-", $passwordArray);

// check if a symbol is needed
if (isset($_GET["includeSymbol"]) && $_GET["includeSymbol"] == 1) {
    // get a random symbol
    $symbol = $symbols[array_rand($symbols)];

    // add symbol to password
    $password .= $symbol;
}

// check if a number is needed
if (isset($_GET["includeNumber"]) && $_GET["includeNumber"] == 1) {
    // get a random digit
    $digit = rand(0,9);

    // add digit to password
    $password .= $digit;
}

echo $password;
