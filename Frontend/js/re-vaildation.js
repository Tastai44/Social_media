$("#submit").click(async () => {
    event.preventDefault()
    var first = $(".first-box").val()
    var surname = $(".surname-box").val()
    var username = $(".username-box").val()
    var password = $(".password-box").val()
    var confirmPassword = $(".confirm-password-box").val()
    var email = $(".email").val()

    // Username
    if(username === "" || first === "" || surname === ""){
        $("#p1").text('Username cannot be blank').show()
        $("#p11").text('First name cannot be blank').show()
        $("#p12").text('Surname cannot be blank').show()

        $(".username-box").css("border-color", "red")
        $(".first-box").css("border-color", "red")
        $(".surname-box").css("border-color", "red")
    }
    else if(username.length < 5){
        $("#p1").text('Username must have at least 5 characters').show()
        $("#p11").text('First name must have at least 5 characters').show()
        $("#p12").text('Surname must have at least 5 characters').show()

        $(".username-box").css("border-color", "red")
        $(".first-box").css("border-color", "red")
        $(".surname-box").css("border-color", "red")
    }
    else{ 
        $("#p1").hide()
        $("#p11").hide()
        $("#p12").hide()

        $(".username-box").css("border-color", "green")
        $(".first-box").css("border-color", "green")
        $(".surname-box").css("border-color", "green")
    }

    // Password
    if(password === ""){
        $("#p2").text('Passwords cannot be blank').show()
        $(".password-box").css("border-color", "red")
    }
    else if(password.length < 8){
        $("#p2").text('Passwords Must be at least 8 characters').show()
        $(".password-box").css("border-color", "red")
    }else if(!checkPassword(password)){
        $("#p2").text('Passwords is invalid').show()
        $(".password-box").css("border-color", "red")
    }
    else{
        $("#p2").hide()
        $(".password-box").css("border-color", "green")
    }

    // Match passwords
    if(confirmPassword === ""){
        $("#p3").text('Re-passwords cannot be blank').show()
        $(".confirm-password-box").css("border-color", "red")
    }
    else if(confirmPassword !== password){
        $("#p3").text('Passwords must match').show()
        $(".confirm-password-box").css("border-color", "red")
    }
    else{
        $("#p3").hide()
        $(".confirm-password-box").css("border-color", "green")
    }

    // Email
    if(email == ""){
        $("#p4").text('Email cannot be blank').show()
        $(".email").css("border-color", "red")
    }
    else if(!isEmail(email)){
        $("#p4").text('Email must be of the form abc@def.ghi').show()
        $(".email").css("border-color", "red")
    }
    else{
        $("#p4").hide()
        $(".email").css("border-color", "green")
        alert("Register is successfully!")
    }
    
    $.ajax({
        url: "../../backend/register.php",
        method: "POST",
        data: { username, first, surname ,password, confirmPassword,email },
        dataType: "json",
        success: async (data) => {
            if (data.success) {
                await sleep(500);
                window.location.href = "../../Login.php";
            }
        },
    })
})

function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms))
}

//Use for validate the space
function hasWhiteSpace(s) { 
    return s.includes(' ')
}

//Use for validate email
function isEmail(email) { 
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

//Use for validate passwords 
function checkPassword(str) { 
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(str);
    }