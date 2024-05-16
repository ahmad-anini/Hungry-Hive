
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmpassword");
console.log(password)
password.addEventListener("input", function() {
    let message = document.getElementById("message");
    if (password.value.length!= 0) {
        if (password.value != confirmPassword.value) {
            message.textContent = "Passwords dont match";
        }
        else {
            message.textContent ="Passwords match";
        }
    }
})
confirmPassword.addEventListener("input", function () {
    let message = document.getElementById("message");
    if (password.value.length!= 0) {
        if (password.value != confirmPassword.value) {
            message.textContent = "Passwords dont match";
        }
        else {
            message.textContent = "Passwords match";
        }
    }
})
function alrt(event){
    if(password.value == ""){
        alert("Password cant be empty");
        event.preventDefault();
    }
}

 

