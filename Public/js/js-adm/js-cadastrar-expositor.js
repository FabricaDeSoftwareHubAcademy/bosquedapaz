//////////// imgens expositor \\\\\\\\\\\\

let input_fotos = document.getElementById('input_fotos')
let conteiner_fotos = document.getElementById('conteiner_fotos')
let content_imgs = document.querySelectorAll('#img_content')
let imgs_tags = document.querySelectorAll('#imagens_produtos')
const imagens = {'files': []}

input_fotos.addEventListener('input', () => {
    let files = input_fotos.files
    for (let i = 0; i < files.length; i++) {
        if(imagens.files.length >= 6){
            openModalError()
            document.getElementById('erro-title').innerText = 'Envie no maximo 6 imagens'
            document.getElementById('erro-text').style.display = 'none'
            document.getElementById('close-modal-erro').addEventListener('click',  () => {
                closeModalError
            })
        }
        imagens.files.push(files[i])
    }

    conteiner_fotos.style.display = 'flex'

    for (let i = 0; i < imagens.files.length; i++) {

        content_imgs[i].style.display = 'flex'

        var objectUrl = URL.createObjectURL(imagens.files[i])
        const reader = new FileReader()

        reader.onloadend = function () {
            var base64 = reader.result;
            imgs_tags[i].src = base64
            imgs_tags[i].style.display = 'block'
        }

        if (imagens.files[i]) {
            reader.readAsDataURL(imagens.files[i]);
        } else {
            imgs_tags[i].src = "";
        }
    }


})




// categorias
async function getCategorias() {

    let categorias = document.getElementById("categorias");

    let dados_php = await fetch('../../../actions/action-listar-categoria.php');

    let response = await dados_php.json();


    html = '<option selected disabled>Selecione</option>';
    for (let i = 0; i < response.dados.length; i++) {
        html += `<option value="${response.dados[i].id_categoria}" > ${response.dados[i].descricao} </option>`;
    }

    categorias.innerHTML = html;
}

// cadastro

let btn_salvar = document.getElementById("btn-salvar");
let modal = document.getElementById("modal_salvar");

btn_salvar.addEventListener('click', function (event) {
    try {
        event.preventDefault()

        var inputs = document.querySelectorAll('input')

        if(!validaInputs(inputs)){
            openModalError()
            document.getElementById('erro-title').innerText = 'Por Favor preencha todos os campos'
            document.getElementById('erro-text').style.display = 'none'
            document.getElementById('close-modal-erro').addEventListener('click',  () => {
                closeModalError
            })
            return 0
        }


        if(!validaCPF(cpf.value)){
            openModalError()
            document.getElementById('erro-title').innerText = 'O CPF inserido é inválido'
            document.getElementById('erro-text').innerText = 'Por Favor, insira um cpf válido'
            document.getElementById('close-modal-erro').addEventListener('click',  () => {
                closeModalError
                window.location.reload()
            })
        }else{

            // pedindo para confirmar o cadastro
            openModalConfirmar()
            document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar)
            document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar)
    
            let cpf = document.getElementById('cpf')
            
            cpf.value = limparCpf(cpf)
    
            var form = event.target.closest('form')
            
            const formData = new FormData(form)
            formData.append('cadastrar', 'true')
            formData.append('tolkenCsrf', document.getElementById('tolkenCsrf').value)
            for (let i = 0; i < imagens.files.length; i++) {
                formData.append(`img-${i}`, imagens.files[i]);
            }

            formData.delete('imagens[]')


            document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
                closeModalConfirmar()

                let response = await fetch("../../../actions/actions-expositor.php", {
                    method: "POST",
                    body: formData
                })
            
                if(response.ok){
                    openModalSucesso()
                    document.getElementById('msm-sucesso').innerText = 'Cadastro realizado com sucesso'
                    document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                        closeModalSucesso
                        window.location.reload()
                    })
                }else{
                    closeModalSucesso()
                    openModalError()
                    let res = await response.json()
                    document.getElementById('erro-title').innerText = res.msg
                    document.getElementById('erro-text').innerText = 'Por favor tente em outro momento'
                    document.getElementById('close-modal-erro').addEventListener('click', () => {
                        closeModalError
                        window.location.reload()
                    })
                }
            })

        }


    } catch (error) {
        document.getElementById('erro-title').innerText = 'Não foi possivel cadastrar o expositor'
        document.getElementById('erro-text').innerText = 'Por favor tente em outro momento'
        document.getElementById('close-modal-erro').addEventListener('click', () => {
            closeModalError
            window.location.reload()
        })
    }
    
})


///////////// VALIDACOES \\\\\\\\\\\\\\\\\\\


// mascara de telefone
const telefoneInput = document.getElementById('whats');
telefoneInput.addEventListener('input', function (e) {
    let valor = e.target.value;
    valor = valor.replace(/\D/g, '');
    valor = valor.substring(0, 11);
    if (valor.length > 0) {
        valor = '(' + valor;
    }
    if (valor.length > 3) {
        valor = valor.slice(0, 3) + ') ' + valor.slice(3);
    }
    if (valor.length > 10) {
        valor = valor.slice(0, 10) + '-' + valor.slice(10);
    }
    e.target.value = valor;
});


function validaInputs(inputs){
    let i = 0
    inputs.forEach(input => {
        if(input.value == null || input.value == ''){
            i++
        }
    });

    if (i == 0){
        return true
    }else{
        return false
    }
}

// mascara cpf

var cpf = document.getElementById('cpf')

cpf.addEventListener('input', function (e) {
    let valor = e.target.value
    e.target.value = mascaraCpf(valor)
})


function mascaraCpf(text){
    let v = text.replace(/\D/g, '').substring(0, 12);
    let cpf = ''
    if (v.length <= 11) {
        if (v.length > 9)
            cpf = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6, 9)}-${v.substring(9, 11)}`;
        else if (v.length > 6)
            cpf = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6)}`;
        else if (v.length > 3)
            cpf = `${v.substring(0, 3)}.${v.substring(3)}`;
        else
            cpf = v;
        return cpf;
    }else{
        return cpf;
    }
}

// valida cpf

function limparCpf(cpf) {
    return cpf.value.replace(/\D/g, '');
}

function validaCPF(cpf) {
    var Soma = 0
    var Resto

    var strCPF = String(cpf).replace(/[^\d]/g, '')

    if (strCPF.length !== 11)
        return false

    if ([
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999',
    ].indexOf(strCPF) !== -1)
        return false

    for (i=1; i<=9; i++)
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

    Resto = (Soma * 10) % 11

    if ((Resto == 10) || (Resto == 11)) 
        Resto = 0

    if (Resto != parseInt(strCPF.substring(9, 10)) )
        return false

    Soma = 0

    for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i)

    Resto = (Soma * 10) % 11

    if ((Resto == 10) || (Resto == 11)) 
        Resto = 0

    if (Resto != parseInt(strCPF.substring(10, 11) ) )
        return false

    return true
}

