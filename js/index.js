var btn = document.getElementById("btn")
var hex = ""
var red = document.getElementById("red")
var omkar = document.getElementById("omkar")
red.addEventListener("click",function (event){
    event.preventDefault()
    if (hex == ""){
        hex = "#ee0505"
        omkar.value = hex 

    }
    else{
        var previous = hex
        hex = "#ee0505"
        omkar.value = hex.concat(previous)
        hex = hex.concat(previous)
    }
})

var green = document.getElementById("green")
green.addEventListener("click",function (event){
    event.preventDefault()
    if (hex == ""){
        hex = "#008000"
        omkar.value = hex 

    }
    else{
        var previous = hex
        hex = "#008000"
        omkar.value = hex.concat(previous)
        hex = hex.concat(previous)
    }

})

var blue = document.getElementById("blue")
blue.addEventListener("click",function (event){
    event.preventDefault()
    if (hex == ""){
        hex = "#0000ff"
        omkar.value = hex 

    }
    else{
        var previous = hex
        hex = "#0000ff"
        omkar.value = hex.concat(previous)
        hex = hex.concat(previous)
    }

})




