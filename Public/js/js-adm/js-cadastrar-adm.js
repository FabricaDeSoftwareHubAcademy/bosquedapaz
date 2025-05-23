// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.getElementById('formCadastro');
//     if (form) {
//       form.addEventListener('submit', function (e) {
//         e.preventDefault();
  
//         const formData = new FormData(form);
  
//         fetch('../../../actions/actions-cadastrar-listar-adm/Cadastro-adm-json.php', {
//           method: 'POST',
//           body: formData
//         })
//         .then(res => res.text())
//         .then(text => {
//           console.log('Resposta bruta:', text);
//           try {
//             const data = JSON.parse(text);
//             alert(data.message);
//           } catch (err) {
//             console.error('Erro ao parsear JSON:', err);
//             alert('Erro inesperado no servidor. Veja o console para mais detalhes.');
//           }
//         })
        
//       });
//     } else {
//       console.error('formCadastro não encontrado');
//     }
//   });

const form = document.getElementById("formCadastro")

form.addEventListener('submit', async function (e) {
    e.preventDefault()

    dados = await fetch("caminho", 
    )
})


  