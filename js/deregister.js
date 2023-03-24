function sendOtp() {
    const btn = document.getElementById('btnotp');
    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "process/process_deregister.php?deregister_otp=true", true);
    xhttp.send();
    btn.innerHTML = "Sent";
}

function checkotp() {
    const inputElement = document.getElementById("tg_verified");
    const inputValue = parseInt(inputElement.value);
    if (inputValue === 1) {
        return true; // submit the form
    } else {
        alert("Telegram must be verified."); // show an error message
        return false; // prevent the form from being submitted
    }
}