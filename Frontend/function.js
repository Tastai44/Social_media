// $("#search_go").click(async () => {
//     var hashtag = $(".search").val()
//     // window.location.href = `search.php?hashtag=${hashtag}`
//     $.ajax({
//         url: "../backend/hashtag.php",
//         method: "POST",
//         data: { hashtag },
//         dataType: "json",
//         success: async (data) => {
//             if (data.success) {
//                 await sleep(2000)
//                 window.location.href = `search.php?hashtag=${hashtag}`
//             } 
//         },
//     })
// })

// function sleep(ms) {
//     return new Promise((resolve) => setTimeout(resolve, ms))
// }


$(document).ready(function(){
    $("#search_go").click(function(){
        var hashtag = $(".search").val()
        if(hashtag == ""){
            $(".search").css("border-color", "red")
            alert("Please press something.")
        }else{
            console.log(hashtag)
            window.location.href = `search.php?hashtag=${hashtag}`
        }
        
    })
  })

//   $(document).ready(function(){
//     $("#search_go").click(function(){
//         var hashtag = $(".search").val()
//         console.log(hashtag)
//         window.location.href = 'search.php?id=17'
//     })
//   })
  