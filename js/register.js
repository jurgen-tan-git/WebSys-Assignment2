function checkInput() {
    // Get the input value from the textbox
    var result = document.getElementById("result");
    var tg_verified = document.getElementById("tg_verified");
    var tg_chat_id = document.getElementById("tg_chat_id");
    var input = document.getElementById("telegram_id").value;

    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // Set up the HTTP GET request
    xhttp.open("GET", "process/process_telegram.php?telegram_id=" + input, true);

    // Define the function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "false"){
                result.innerHTML = "Verification failed, please start the bot using the link above and try again.";
                tg_verified.value = "0";
            } else {
                result.innerHTML = "Verified";
                tg_verified.value = "1";
                tg_chat_id.value = this.responseText;
            }
        }
    };
    xhttp.send();
}

function checkValue() {
    const inputElement = document.getElementById("tg_verified");
    const inputValue = parseInt(inputElement.value);
    if (inputValue === 1) {
        return true; // submit the form
    } else {
        alert("Telegram must be verified."); // show an error message
        return false; // prevent the form from being submitted
    }
}