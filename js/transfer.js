function checkaccount() {
    // Get the input value from the textbox
    var result = document.getElementById("result");
    var acct_verified = document.getElementById("acct_exist");
    var input = document.getElementById("toAccount").value;

    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // Set up the HTTP GET request
    xhttp.open("GET", "process/process_transfer.php?email=" + input, true);

    // Define the function to handle the response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "exist"){
                result.innerHTML = "Email exists.";
                acct_verified.value = "1";
            } else if (this.responseText == "self"){
                result.innerHTML = "Can't transfer to ownself.";
                acct_verified.value = "0";
            } else {
                result.innerHTML = "Email does not exist. Please check the email again.";
                acct_verified.value = "0";
            }
        }
    };
    xhttp.send();
}

function checkValue() {
    const inputElement = document.getElementById("acct_exist");
    const inputValue = parseInt(inputElement.value);
    if (inputValue === 1) {
        return true; // submit the form
    } else {
        alert("Telegram must be verified."); // show an error message
        return false; // prevent the form from being submitted
    }
}