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

//////////// imgens expositor \\\\\\\\\\\\

let input_fotos = document.getElementById('input_fotos')


input_fotos.addEventListener('change', () => {
    let imgs_files = input_fotos.files
    let show_imgs = document.querySelectorAll('.imgs_produtos')
    let conteiner_imgs = document.querySelectorAll('.content_fotos')
    document.getElementById('conteiner_fotos').style.display = 'flex'


    console.log(imgs_files[0])

    if(imgs_files.length > 0) {
        for (let i = 0; i < imgs_files.length; i++) {
            const imagem = imgs_files[i];

            const reader = new FileReader();
            reader.onload = (e) => {
                show_imgs[i].src = e.target.result
                conteiner_imgs[i].style.display = 'flex'
            }
            reader.readAsDataURL(imagem);
        }
    }
})
