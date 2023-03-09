<!DOCTYPE html>
<html lang="en-us">
    <head>
    <title>World of Pets</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity=
        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <script defer src="js/main.js"></script>
    </head>
    <body>
        <?php
            include "nav.inc.php";
            if (!isset($_SESSION['email'])|!isset($_SESSION['fname'])){
                session_destroy();
                header("Location: login2.php");
            }
            $login_error = "";
            $email = $_SESSION['email'];
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "incorrect") {
                    $login_error = " Sorry, it seems that the <b> OTP is incorrect </b>. Please try again.";
                }
            }
        ?>
        <main class="container">
            <form action="process/process_login.php" method="POST">
                <div class="inputfield" style="width: 100%;display: flex;justify-content: space-around;">
                    <input type="number" maxlength="1" class="input" disabled />
                    <input type="number" maxlength="1" class="input" disabled />
                    <input type="number" maxlength="1" class="input" disabled />
                    <input type="number" maxlength="1" class="input" disabled />
                    <input type="number" maxlength="1" class="input" disabled />
                    <input type="number" maxlength="1" class="input" disabled />
                </div>
                <input type="hidden" id="input-otp" name="input-otp" value="">
                <?php if($login_error): ?>
                    <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                        <?php echo $login_error ?>
                    </div>
                <?php endif; ?>
                <button class="btn btn-primary" id="btn-submit" onclick="validateOTP()" type="submit">Log In</button>
            </form>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>

    <script>
        const input = document.querySelectorAll(".input");
        const inputField = document.querySelector(".inputfield");
        const submitButton = document.getElementById("submit");
        let inputCount = 0,
        finalInput = "";

        const updateInputConfig = (element, disabledStatus) => {
        element.disabled = disabledStatus;
        if (!disabledStatus) {
            element.focus();
        } else {
            element.blur();
        }
        };

        input.forEach((element) => {
        element.addEventListener("keyup", (e) => {
            e.target.value = e.target.value.replace(/[^0-9]/g, "");
            let { value } = e.target;

            if (value.length == 1) {
            updateInputConfig(e.target, true);
            if (inputCount <= 5 && e.key != "Backspace") {
                finalInput += value;
                if (inputCount < 5) {
                updateInputConfig(e.target.nextElementSibling, false);
                }
            }
            inputCount += 1;
            } else if (value.length == 0 && e.key == "Backspace") {
            finalInput = finalInput.substring(0, finalInput.length - 1);
            if (inputCount == 0) {
                updateInputConfig(e.target, false);
                return false;
            }
            updateInputConfig(e.target, true);
            e.target.previousElementSibling.value = "";
            updateInputConfig(e.target.previousElementSibling, false);
            inputCount -= 1;
            } else if (value.length > 1) {
            e.target.value = value.split("")[0];
            }
            submitButton.classList.add("hide");
        });
        });

        window.addEventListener("keyup", (e) => {
        if (inputCount > 3) {
            submitButton.classList.remove("hide");
            submitButton.classList.add("show");
            if (e.key == "Backspace") {
            finalInput = finalInput.substring(0, finalInput.length - 1);
            updateInputConfig(inputField.lastElementChild, false);
            inputField.lastElementChild.value = "";
            inputCount -= 1;
            submitButton.classList.add("hide");
            }
        }
        });

        const validateOTP = () => {
            document.getElementById("input-otp").value = finalInput;
            alert(document.getElementById("input-otp").value);
        };

        //Start
        const startInput = () => {
        inputCount = 0;
        finalInput = "";
        input.forEach((element) => {
            element.value = "";
        });
        updateInputConfig(inputField.firstElementChild, false);
        };

        window.onload = startInput();
    </script>
</html>