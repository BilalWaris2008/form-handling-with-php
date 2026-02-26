function createAccount() {
    let fullname = document.getElementById("fullname").value
    let email = document.getElementById("email").value
    let password = document.getElementById("password").value

    document.getElementById("fullname").style.border = "1px solid gray"
    document.getElementById("email").style.border = "1px solid gray"
    document.getElementById("password").style.border = "1px solid gray"

    document.getElementById("error-fullname").innerHTML = ""
    document.getElementById("error-email").innerHTML = ""
    document.getElementById("error-password").innerHTML = ""

    let isvalid = true
    if (fullname === "") {
        document.getElementById("error-fullname").innerHTML = "This Field is Required"
        document.getElementById("fullname").style.border = "1px solid red"
        isvalid = false
    }

    if (email === "") {
        document.getElementById("error-email").innerHTML = "This Field is Required"
        document.getElementById("email").style.border = "1px solid red"
        isvalid = false
    }

    if (password === "") {
        document.getElementById("error-password").innerHTML = "This Field is Required"
        document.getElementById("password").style.border = "1px solid red"
        isvalid = false
    }

    if (isvalid) {
        alert("Account Created Successfully")

        console.log(fullname);
        console.log(email);
        console.log(password);

        document.getElementById("fullname").value = ""
        document.getElementById("email").value = ""
        document.getElementById("password").value = ""
    }
}