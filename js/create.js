document.getElementById("createform").addEventListener("submit", function (event) {
    if (!validateForm()) {  // if the validation of the form fails, we will not submit the form.                             
        event.preventDefault(); // prevents the form from submitting.
    } else {
        if (!confirm("Confirm Submission of Feedback Form?")) { // if form not confirmed to submit , we will not submit the form         
            event.preventDefault(); // prevents the form from submitting.
        }
    }
});

function validateForm() {
    var formOK = true;
    var userid = document.getElementById("userid").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    clearErrorMsgs();

    // userid field validations
    if (userid.length == 0) {
        formOK = false;
        document.getElementById("userid_err").innerHTML = "Please enter a UserID.";
    }

    // email field validations
    if (email.length == 0) {
        formOK = false;
        document.getElementById("email_err").innerHTML = "Please enter an email address.";
    } else {
        if (!validateEmail(email)) {
            formOK = false;
            document.getElementById("email_err").innerHTML = "Please enter a valid email address.";
        }
    }

    // mobile field validations
    if (mobile.length == 0) {
        formOK = false;
        document.getElementById("mobile_err").innerHTML = "Please enter a mobile number.";
    } else {
        if (!validateMobile(mobile)) {
            formOK = false;
            document.getElementById("mobile_err").innerHTML = "Mobile number must be 8 digits.";
        }
    }

    // password field validations
    if (password.length == 0) {
        formOK = false;
        document.getElementById("password_err").innerHTML = "Password must not be empty.";
    }else {
        if (!validatePassword(password)) {
            formOK = false;
            document.getElementById("password_err").innerHTML = "Password must be between 8 and 32 characters.";
        }
    }

    // confirm password field validations
    if (confirmPassword.length == 0) {
        formOK = false;
        document.getElementById("confirm_password_err").innerHTML = "Please confirm your password.";
    } else if (password !== confirmPassword) {
        formOK = false;
        document.getElementById("confirm_password_err").innerHTML = "Passwords do not match.";
    }

    return formOK;
}


function validateMobile(str) {
    // a shorter way to test regex
    return /^\d{8}$/.test(str); // using regex to ensure all 8 characters in string are numbers.
}

function validateEmail(str) {
    // using regex again to validate email address: go to https://regexr.com/ and see the meaning of this regex expression below
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(str);
}

function validatePassword(password) {
    return password.length >= 8 && password.length <= 32;
}


// clears the error messages
function clearErrorMsgs() {
    var labels = document.getElementsByClassName("err_label");

    for (let i = 0; i < labels.length; i++) {
        labels[i].innerHTML = "";
    }
}
