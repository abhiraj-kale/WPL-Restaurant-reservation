

window.onload = function (e) {
    document.getElementById('email').focus()
}
function checkEmail(email) {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}

function checkUsername(username) {
    return username.length >= 4;
}

function checkPassword(p) {
    errors = []
    if (p.length < 6) {
        errors.push("Your password must be at least 6 characters");
    }
    if (p.search(/[a-z]/i) < 0) {
        errors.push("Your password must contain at least one letter.");
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}

function signup(e) {
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    if (!checkEmail(email)) {
        alert("Please enter a valid email");
        return false;
    }
    if (!checkUsername(username)) {
        alert("Username length should be 4 or more characters");
        return false;
    }
    if (!checkPassword(password)) {
        return false;
    }
    return true;
}

// Key events
document.getElementById('username').addEventListener('keyup', function(){
    if ((this.value.length)<5) {
        this.style.borderColor = "red";
        document.getElementById('label_username').style.visibility = 'visible';
    } else {
        this.style.borderColor = "green";
        document.getElementById('label_username').style.visibility = 'hidden';
    }
})