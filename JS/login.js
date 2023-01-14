function validation() {
    var userName = document.f1.userName.value;
    var password = document.f1.password.value;
    if (userName.length == "" && password.length == "") {
        alert("User Name and Password fields are empty");
        return false;
    }
    else {
        if (userName.length == "") {
            alert("User Name is empty");
            return false;
        }
        if (password.length == "") {
            alert("Password field is empty");
            return false;
        }
    }
}  
