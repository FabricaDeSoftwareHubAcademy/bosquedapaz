const label = document.querySelectorAll('#label')

function onEnter (l){
    l.classList.add('active')
}
function onLeave (l){
    l.classList.remove('active')
}

label[0].addEventListener('dragenter', onEnter(label[0]))
label[0].addEventListener('drop', onLeave(label[0]))
label[0].addEventListener('dragend', onLeave(label[0]))
label[0].addEventListener('dragleave', onLeave(label[0]))

const input = document.querySelector("#imagens-input")
const zoneimg1 = document.querySelector("#img1")
const zoneimg2 = document.querySelector("#img2")
const zoneimg3 = document.querySelector("#img3")

var cont = 0
input.addEventListener("change", event => {
    cont++
    console.log(cont)
    if (input.files.length > 0){

        const type = input.files[0].type
        const formats = ["image/jpg", "image/png", "image/jpeg"]

        if (!formats.includes(type)) {
            alert("O formato desta imagem não é permitido, somente .jpg, .png, .jpeg")
            cont = 0
            return;
        }
        

        if (input.files.length == 2){
            cont = 0
        }
        if (input.files.length == 1 || cont == 1){
            const boxImgs = document.getElementById('zone-imgs')
            boxImgs.style.display = "flex"
            
            const img1 = document.createElement("img")
            img1.id = "cover"
            img1.src = URL.createObjectURL(input.files[0])
            
            zoneimg1.appendChild(img1)

            console.log(1)
        }
        
        if (input.files.length-1 == 2){
            const type = input.files[1].type
            
            if (!formats.includes(type)) {
                alert("O formato desta imagem não é permitido, somente .jpg, .png, .jpeg")
                cont = 0
                return;
            }
            const img2 = document.createElement("img")
            img2.id = "cover"
            img2.src = URL.createObjectURL(input.files[1])
    
            zoneimg2.appendChild(img2)
            console.log(2)
        }
        if (cont == 2){
            const type = input.files[0].type
            
            if (!formats.includes(type)) {
                alert("O formato desta imagem não é permitido, somente .jpg, .png, .jpeg")
                cont = 0
                return;
            }
            const img2 = document.createElement("img")
            img2.id = "cover"
            img2.src = URL.createObjectURL(input.files[0])
    
            zoneimg2.appendChild(img2)
        }




        if (input.files.length == 3){
            const type = input.files[2].type
            
            if (!formats.includes(type)) {
                alert("O formato desta imagem não é permitido, somente .jpg, .png, .jpeg")
                cont = 0
                return;
            }
            const img = document.createElement("img")
            img.id = "cover"
            img.src = URL.createObjectURL(input.files[2])
    
            zoneimg3.appendChild(img)
            console.log(3)
        }
        if (cont == 3){
            const type = input.files[0].type
            
            if (!formats.includes(type)) {
                alert("O formato desta imagem não é permitido, somente .jpg, .png, .jpeg")
                cont = 0
                return;
            }
            const img2 = document.createElement("img")
            img2.id = "cover"
            img2.src = URL.createObjectURL(input.files[0])
    
            zoneimg3.appendChild(img2)
        }

    }
})