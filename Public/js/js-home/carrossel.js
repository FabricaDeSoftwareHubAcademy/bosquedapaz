var cont = 1

const menu = document.getElementById('cabecalho')
const ul = document.getElementsByClassName('link-menu')
const arrow_left = document.getElementById("arrow-left")
const arrow_right = document.getElementById("arrow-right")

const slide_item = document.getElementById("slider-item")

document.getElementById('radio1').checked = true

const interval = setInterval(() => {
    slider()
}, 3000)

function slider(){
    cont += 1
    if (cont > 3){
        document.getElementById('slider-item3').style.zIndex = 0
        document.getElementById('slider-item2').style.zIndex = 0
        // document.getElementById('slider-item1').style.zIndex = 0
        cont = 1
    }
    
    document.getElementById('radio' + cont).checked = true
    document.getElementById('slider-item' + cont).style.zIndex = 1

    // slide_item.style.backgroundImage = `url('imgs/img-home/imagem-carrossel-${cont}.JPG')`

}

arrow_left.addEventListener("click", function(){
    cont--
    if (cont < 1){
        cont = 3
        document.getElementById('radio' + cont).checked = true
        document.getElementById('slider-item3').style.zIndex = 1
        document.getElementById('slider-item2').style.zIndex = 0
        document.getElementById('slider-item1').style.zIndex = 0
    }
    if (cont == 1){
        console.log(cont)
        document.getElementById('radio' + cont).checked = true
        document.getElementById('slider-item3').style.zIndex = 0
        document.getElementById('slider-item2').style.zIndex = 0
        document.getElementById('slider-item' + cont).style.zIndex = 1
    }
    else if (cont == 2){
        console.log(cont)
        document.getElementById('radio' + cont).checked = true
        document.getElementById('slider-item3').style.zIndex = 0
        document.getElementById('slider-item1').style.zIndex = 0
        document.getElementById('slider-item' + cont).style.zIndex = 1
    }
    // slide_item.style.backgroundImage = `url('imgs/img-home/imagem-carrossel-${cont}.JPG')`
})
arrow_right.addEventListener("click", function(){
    cont++
    if (cont > 3){
        cont = 1
        document.getElementById('slider-item3').style.zIndex = 0
        document.getElementById('slider-item2').style.zIndex = 0
        document.getElementById('slider-item1').style.zIndex = 1
    }
    // console.log(cont)
    document.getElementById('radio' + cont).checked = true
    document.getElementById('slider-item' + cont).style.zIndex = 1
    // slide_item.style.backgroundImage = `url('imgs/img-home/imagem-carrossel-${cont}.JPG')`

})