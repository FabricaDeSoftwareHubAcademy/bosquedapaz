document.addEventListener('DOMContentLoaded', async () => {
    let response = await fetch('../../../actions/valida_adm.php');
    if(!response.ok){
        document.location.replace('../Client/tela-login.php')
    }
    
})