
$("#submit").click(async () => {
    var username = $(".username-box").val()
    var password = $(".password-box").val()
    
    // Username
    if(username === ""){
        $("#p1").text('Username cannot be blank').show()
        $(".username-box").css("border-color", "red")
    }
    else{ 
        $("#p1").hide()
        $(".username-box").css("border-color", "red")
    }

    // Password
    if(password === ""){
        $("#p2").text('Passwords cannot be blank').show()
        $(".password-box").css("border-color", "red")
    }
    else{
        $("#p2").hide()
        $(".password-box").css("border-color", "red")
    }

    // if(password !== ""){
    //     $(".username-box").css("border-color", "green")
    //     $(".password-box").css("border-color", "green")
    // }

    $.ajax({
        url: "./backend/login.php",
        method: "POST",
        data: { username, password },
        dataType: "json",
        success: async (data) => {
            if (data.success) {
                await sleep(2000)
                $(".username-box").css("border-color", "green")
                $(".password-box").css("border-color", "green")
                alert("Login is successful!")
                window.location.href = "../Social_media/Frontend/Home.php"
            }else{
                alert("Username or passwords are wrong!")
                $(".username-box").css("border-color", "red")
                $(".password-box").css("border-color", "red")
            }
        },
    })
    
    // if(!check){
    //     $("#p3").text('Username or Passwords are invalid').show()
    // }else {
    //     $(".username-box").css("border-color", "green")
    //     $(".password-box").css("border-color", "green")
    // }
    
})

function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms))
}