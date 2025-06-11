document.addEventListener("click", (event) => {
  if (event.target.classList.contains("status")) {
    event.target.classList.toggle("active");
    event.target.classList.toggle("inactive");
    event.target.textContent = event.target.classList.contains("active") ? "Ativo" : "Inativo";
  }
});

for(let x = 0; x < response.length; x++){

  html += `<tr>
  <td class="usuario-col">${colab['id_colaborador']}</td>
  <td>${colab['nome']}</td>
  <td class="email-col">${colab['email']}</td>
  <td class="fone-col">${colab['telefone']}</td>
  <td class="cargo-col">${colab['cargo']}</td>
  <td>
      <button 
          type="button" 
          class="status ${response[x].status_utilidade == 1 ? 'active' : 'inactive'}"> ${response[x].status_utilidade == 1 ? 'Ativo' : 'Inativo'}
      </button>
  </td>
</tr>`;

}