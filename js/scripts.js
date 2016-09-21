//form validation
$('#criteria_form').submit(function(e) {
    // get the number of words requested
    var numWords = $('#f_numwords').val();
alert(numWords);
    if (isNaN(numWords) || numWords > 9) {
        $('#message').text("Invalid number given.");
        e.preventDefault();
    }
});
