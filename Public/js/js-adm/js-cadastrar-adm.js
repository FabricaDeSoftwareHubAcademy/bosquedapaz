document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formCadastro');
  
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
        const formData = new FormData(form);
        let dados_php = await fetch('../../../actions/cadastrar-listar-adm.php', 
            {method: "POST",
            body: formData}
        );
        
        let response = await dados_php.json();
        
        console.log(response);
  
    });
  });
  