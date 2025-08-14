let slider = document.getElementById('slider')
let arrowLeft = document.getElementById('arrow-left')
let arrowRight = document.getElementById('arrow-right')
let balls = document.querySelectorAll('.ball')

let x = 0
function trocaImagem(img, n) {
    slider.style.backgroundImage = `url('../../${img}')`;

    balls.forEach((ball, i) => {
        ball.classList.toggle('active', i === n);
    });

    x = n;
}


async function getImage() {
  
    try {
        let imagens = await fetch("../../../actions/action-carrossel.php")
    
        let resposta = await imagens.json()
    
        slider.style.backgroundImage = `url('../../${resposta.imagens[0].caminho}')`

        const interval = setInterval(() => {
                if (x == 0){
                    trocaImagem(resposta.imagens[1].caminho,1)
                }
                else if (x == 1){
                    trocaImagem(resposta.imagens[2].caminho,2)
                }
                else if (x == 2){
                    trocaImagem(resposta.imagens[0].caminho ,0)
            }
        }, 3000)
    
    
        arrowLeft.addEventListener('click', () => {
            if (x == 0){
                trocaImagem(resposta.imagens[2].caminho,2)
            }
            else if (x == 1){
                trocaImagem(resposta.imagens[0].caminho,0)
            }
            else if (x == 2){
                trocaImagem(resposta.imagens[1].caminho ,1)
            }
        })
    
        arrowRight.addEventListener('click', () => {
            if (x == 0){
                trocaImagem(resposta.imagens[1].caminho,1)
            }
            else if (x == 1){
                trocaImagem(resposta.imagens[2].caminho,2)
            }
            else if (x == 2){
                trocaImagem(resposta.imagens[0].caminho ,0)
            }
        })
    } catch (error) {
        slider.style.backgroundImage = "url('../../../Public/uploads/uploads-carrosel/img-carrossel-1.jpg')"

        const interval = setInterval(() => {
                if (x == 0){
                    trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-1.jpg',1)
                }
                else if (x == 1){
                    trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-2.jpg',2)
                }
                else if (x == 2){
                    trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-3.jpg',0)
            }
        }, 3000)
    
    
        arrowLeft.addEventListener('click', () => {
            if (x == 0){
                trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-1.jpg',2)
            }
            else if (x == 1){
                trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-2.jpg',0)
            }
            else if (x == 2){
                trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-3.jpg' ,1)
            }
        })
    
        arrowRight.addEventListener('click', () => {
            if (x == 0){
                trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-1.jpg',1)
            }
            else if (x == 1){
                trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-2.jpg',2)
            }
            else if (x == 2){
                trocaImagem('../Public/uploads/uploads-carrosel/img-carrossel-3.jpg' ,0)
            }
        }) 
    }

}

getImage()